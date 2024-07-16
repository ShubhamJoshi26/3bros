<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\SendMail;
use App\Mail\SendMailToEndUser;
use Illuminate\Support\Facades\Http;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function paginate($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total   ,$perPage);
    }

    public function sendClientMails($data)
    {
        
        $clientname = '3Bros';
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['mobile'];
        $msg = $data['message'];
        $nop = $data['nop'];
        $venue = $data['venue'];
        $clientemailid = '3brosowners@gmail.com';
        $clientemailid1 = ['shubh26joshi333@gmail.com', 'shyam@wmmsols.com'];
        // $clientemailid = 'shubh26joshi333@gmail.com';
        $clientmailbody = 'Greeting!! <br> We have recieved a new enquiry details mention as below: <br> Name = '.$name. ' <br>  Email = '.$email.' <br> Phone Number = '.$phone.' <br> Message = '.$msg.' <br> Number of Person = '.$nop.' <br> Venue = '.$venue.' Thanks ';
        $clientmailsubject = 'New Enquiry Recieved';
        $customermailbody = 'We have recieved your enquiry, we will connect you to soon. <br> Thanks & Regards <br> '.$clientname;
        $customermailsubject = 'Thanks For Enquiry';
        Mail::to($clientemailid)->cc($clientemailid1)->send(new SendMail($name,$email,$clientmailsubject,$clientmailbody));
        return Mail::to($email)->cc($clientemailid1)->send(new SendMailToEndUser($name,$customermailbody,'',$customermailsubject));
    }
    public function createUrlEntity($data)
    {
        $location = str_replace(' ','-',$data->location);
        $config =  str_replace(' - ',' ',$data->configurations);
        $config =  str_replace(' ','-',$config);
        $type = str_replace(' ','-',$data->type);
        $area = str_replace(' ','-',$data->area);
        $project_name = str_replace(' ','-',$data->project_name);
        $url = 'property-for-sale-in-'.$location.'-'.$project_name.'-'.$type.'-'.$config.'-'.$area;
        return strtolower($url);
    }

    public function manageOuterBlogs($data,$url,$method,$path)
    {
        // $url = $data['url'];
        $url = $url['domain'].'/process.php';
        $data['request'] = $method;
        $data['filepath'] = $path;
        // print_r($url);die;
        $ch=curl_init($url);
                    
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('content-Type','application/json'));
        $result=curl_exec($ch);
        curl_close($ch);
        return json_encode($result);
    }
    public function sendDataToTeleCrm($data)
    {
        $curl = curl_init();
        $data = json_encode($data,true); 
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.telecrm.in/enterprise/664c921f18c25b7433e8f178/autoupdatelead',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$data,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 4da40967-e616-45f4-9217-4f2962419a2e1718353799913:dfc53bc0-ebd7-42b4-b687-95fdd84b0a6d',
            'Accept: application/json',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
}
