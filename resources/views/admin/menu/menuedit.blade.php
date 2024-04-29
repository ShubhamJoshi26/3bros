{{-- <x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="p-6 bg-white border-b border-gray-200">
            You're logged in!
         </div>
      </div>
   </div>
</div>
</x-app-layout> --}}
@include('admin.layout.header')

@php
$menuid = $menuData->menuid;
$name = (old('name') != '' ) ? old('name') : $menuData->name;
$menu_parent_id = (old('menu_parent_id') != '' ) ? old('menu_parent_id') : $menuData->sub_id;
$menuType = (old('menuType') != '' ) ? old('menuType') : $menuData->menuType;
$sort_order = (old('sort_order') != '') ? old('sort_order') : $menuData->weight;
$publish = (old('status') != '' ) ? old('status') : $menuData->status;
$position = (old('position') != '' ) ? old('position') : $menuData->position;
$menuurl = $menuData->menu_url;
$typeid = $menuData->typeid;
@endphp
@php
$premalinkname = array("page"=>"Page");
@endphp
@php
$data_publish = array("1"=>"Enable","0"=>"Disable")
@endphp

<div class="page-wrapper">
   <div class="page-content">
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Manage Website</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item">
                     <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                     </a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Manage Menu</li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <form method='POST' id="blog" name="blog" class="form-horizontal" action='{!!  url('admin/menu/update/'.$menuid) !!}'>
               @CSRF
               <input type="hidden" name="_token" value="{!! csrf_token() !!}">
               <input type="hidden" name="menu_url" value="{{$menuurl}}">
               <input type="hidden" name="typeid" value="{{$typeid}}">
               <input type="hidden" name="sort_order" value="0">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label class="form-label">Menu Name</label>
                     <div class="control icons-left">
                        <input class="form-control" type="text" name="name" placeholder="Name" value="{{$name}}">
                        <span class="icon left"><i class="mdi mdi-menu"></i></span>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label">Parents</label>
                     <div class="control">
                        <div class="select">
                           <select name="menu_parent_id" id="menu_parent_id" class="form-control select2">
                              <option value="0">None</option>
                              @foreach($menu as $value)
                              @if($menu_parent_id == $value->menuid)
                              <option value="{{$value->menuid}}" selected>{{$value->name}}</option>
                              @else
                              <option value="{{$value->menuid}}">{{$value->name}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6" id="positioninput"> 
                  <label class="form-label">Position</label>
               <input class="form-control"  name="position" placeholder="Menu Position" value="{{$position}}" ></div>
                  </div>
                  <div class="form-group col-md-6">
                     <label class="form-label">Menu Type</label>
                     <div class="control">
                        <div class="select">
                           <select name="menuType" id="premalink" class="form-control select2">
                              <option value="none">None</option>
                              @foreach($premalinkname as $key=>$value)
                              @if($menuType == $key)
                              <option value="{{$key}}" selected>{{$value}}</option>
                              @else
                              <option value='{{$key}}'>{{$value}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6" id="premalinkidothers"> </div>
                  <div class="form-group col-md-6" id="premalinkid"></div>
                  <div class="form-group col-md-6">
                     <label class="form-label">Publish</label>
                     <div class="control">
                        <div class="select">
                           <select name="status" class="form-control select">
                              @foreach($data_publish as $key=>$value)
                              @if($publish == $key)
                              <option value='{{$key}}' selected>{{$value}}</option>
                              @else
                              <option value='{{$key}}'>{{$value}}</option>
                              @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="form-group col-md-6 mt-3 grouped">
                  <div class="control">
                     <button type="submit" class="btn btn-success">
                        Submit
                     </button>
                     <button type="reset" class="btn btn-danger">
                        Reset
                     </button>
                  </div>
                  <div class="control">

                  </div>
               </div>

            </form>
         </div>
      </div>
   </div>
</div>
</div>

<link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="{{ asset('admin/dist/css/sb-admin-2.css') }}" rel="stylesheet" type="text/css" />

<!-- Morris Charts CSS -->
<link href="{{ asset('admin/vendor/morrisjs/morris.css') }}" rel="stylesheet" type="text/css" />
<script>
   $(document).ready(function() {
      $('#premalink').change(function() {
         var premalinkPage = $('#premalink').val();

         if (premalinkPage != '') {
            $.ajax({
               url: "{{url('/')}}/admin/menu/fetch_page/" + premalinkPage,
               method: "get",
               dataType: "html",
               data: {
                  premalinkPage: premalinkPage
               },
               error: function(request, error) {
                  console.log(arguments);
                  alert(" Can't do because: " + error);
               },
               success: function(data) {
                  $('#premalinkid').html(data);
               }
            });
         }
      });
      $('#menu_parent_id').change(function() {
         $('#premalinkidothers').hide();
         var premalinkPage = $('#menu_parent_id').val();
         if (premalinkPage == 0) {
            $('#positioninput').show();
         }
         else
         {
            $('#positioninput').hide();
         }
      });
      setTimeout(() => {
         if($('#menu_parent_id').val()==0)
         {
            $('#positioninput').show();
         }
      }, 2000);
   });
</script>
@include('admin.layout.footer')