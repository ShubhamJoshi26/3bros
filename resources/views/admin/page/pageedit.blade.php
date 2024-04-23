@extends('admin.layouts.app')
@php
$pageTitle = (old('pageTitle') != '') ? old('pageTitle') : $pageData->pageTitle;
$pageParent = (old('pageParent') != '') ? old('pageParent') : $pageData->pageParent;
$pageURL = (old('pageURL') != '') ? old('pageURL') : $pageData->pageURL;
$pageContent = (old('pageContent') != '') ? old('pageContent') : $pageData->pageContent;
$pageContent2 = (old('pageContent2') != '') ? old('pageContent2') : $pageData->pageContent1;
$pageContent3 = (old('pageContent3') != '') ? old('pageContent3') : $pageData->pageContent2;
$pageMetaTitle = (old('pageMetaTitle') != '') ? old('pageMetaTitle') : $pageData->pageMetaTitle;
$pageMetaDescription = (old('pageMetaDescription') != '') ? old('pageMetaDescription') : $pageData->pageMetaDescription;
$pageMetaKeywords = (old('pageMetaKeywords') != '') ? old('pageMetaKeywords') : $pageData->pageMetaKeywords;
$registration = (old('registration') != '') ? old('registration') : $pageData->registration;
$status = (old('status') != '') ? old('status') : $pageData->status;
$pageid = $pageData->id;

$pageType = (old('pageType') != '' ) ? old('pageType') : $pageData->pageType;
$page_array = array(""=>"Select Page","normalpage"=>"Normal Page","certifiedpage"=>"Certified Page");

$data_publish = array("1" => "Enable", "0" => "Disable");
@endphp
<style>
   /* Example custom styles using Tailwind CSS-inspired classes */
   .note-editor .note-toolbar {
      background-color: #F9FAFB;
      border-bottom: 1px solid #E2E8F0;
      padding: 1rem;
   }

   .note-editor .note-editing-area {
      background-color: #FFFFFF;
      border: 1px solid #E2E8F0;
      border-radius: 0.25rem;
      padding: 1rem;
   }
</style>
<section class="section main-section">
   <form method="POST" id="page" name="page" class="form-horizontal" action="{!!  url('admin/page/update/'.$pageid) !!}" enctype="multipart/form-data">
      @CSRF
      <input type="hidden" name="imagename" value="{{$pageData->pageBanner}}">
      <div class="card mb-6">
         <header class="card-header">
            <p class="card-header-title">
               <span class="icon"><i class="mdi mdi-ballot"></i></span>
               Page Update Settings
            </p>
         </header>
         <div class="card-content">
            @if ($errors->any())
            <div class="alert alert-danger">
               <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  @foreach ($errors->all() as $error)
                  <p><span class="font-medium">Error!</span> {{ $error }}</p>
                  @endforeach
               </div>
            </div>
            @endif
            <div class="field">
               <label class="label">Page Title</label>
               <div class="control">
                  <input class="input" placeholder="Page Title" name="pageTitle" value="{{$pageTitle}}">
               </div>
               @error('pageTitle')
               <span class="text-red-500">The page title field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Page Type</label>
               <div class="control">
                  <div class="select">
                     <select name="pageType">
                        @foreach($page_array as $key=>$value)
                        @if($pageType == $key)
                        <option value='{{$key}}' selected>{{$value}}</option>
                        @else
                        <option value='{{$key}}'>{{$value}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="field">
               <label class="label">Page Url</label>
               <div class="control ">
                  <input class="input" placeholder="Page Url" name="pageURL" value="{{$pageURL}}">
               </div>
               <p class="help">
                  Please enter custom value url like or Enter title copy paste (Contact,IPL 2022,Portfolio)
               </p>
               @error('pageTitle')
               <span class="text-red-500">The Page Url field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Parents</label>
               <div class="control">
                  <div class="select">
                     @if($pageparentdata =="")
                     <select name="pageParent">
                        <option value="0">None</option>
                     </select>
                     @else
                     {!! $pageparentdata !!}
                     @endif
                  </div>
               </div>
            </div>
            <div class="field">
               <label class="label">Page Content 1</label>
               <div class="control">
                  <textarea class="form-control ckeditor textarea" rows="10" id="summernote1" name="pageContent" placeholder="Page Description" value="">{{$pageContent}}</textarea>
                  <script>
                     CKEDITOR.replace('pageContent', {
                        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                        filebrowserUploadMethod: 'form',

                     });
                  </script>
               </div>
               @error('pageContent')
               <span class="text-red-500">The Page Content field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Page Content 2</label>
               <div class="control">
                  <textarea class="form-control ckeditor textarea" rows="10" id="summernote2" name="pageContent2" placeholder="Page Description 2" value="">{{$pageContent2}}</textarea>
                  <script>
                     CKEDITOR.replace('pageContent2', {
                        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                        filebrowserUploadMethod: 'form',

                     });
                  </script>
               </div>
               @error('pageContent')
               <span class="text-red-500">The Page Content field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Page Content 3</label>
               <div class="control">
                  <textarea class="form-control ckeditor textarea" rows="10" id="summernote3" name="pageContent3" placeholder="Page Description 3" value="">{{$pageContent3}}</textarea>
                  <script>
                     CKEDITOR.replace('pageContent3', {
                        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
                        filebrowserUploadMethod: 'form',

                     });
                  </script>
               </div>
               @error('pageContent3')
               <span class="text-red-500">The Page Content3 field is required.</span>
               @enderror
            </div>
         </div>
      </div>
      <hr>
      <div class="card mb-6">
         <header class="card-header">
            <p class="card-header-title">
               <span class="icon"><i class="mdi mdi-ballot-outline"></i></span>
               Page Seo Settings
            </p>
         </header>
         <div class="card-content">
            <div class="field">
               <label class="label">Page Meta Title</label>
               <div class="control">
                  <input class="input" name="pageMetaTitle" placeholder="Page Meta Title" value="{{$pageMetaTitle}}">
               </div>
               @error('pageMetaTitle')
               <span class="text-red-500">The Page Meta Title field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Meta Description</label>
               <div class="control">
                  <textarea class="textarea" rows="3" name="pageMetaDescription" placeholder="Page Meta Description">{{$pageMetaDescription}}</textarea>
               </div>
               @error('pageMetaDescription')
               <span class="text-red-500">The Page Meta Description field is required.</span>
               @enderror
            </div>
            <div class="field">
               <label class="label">Meta Keywords</label>
               <div class="control">
                  <textarea class="textarea" rows="3" name="pageMetaKeywords" placeholder="Page Meta Keywords">{{$pageMetaKeywords}}</textarea>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <div class="card mb-6">
         <header class="card-header">
            <p class="card-header-title">
               <span class="icon"><i class="mdi mdi-ballot-outline"></i></span>
               Page Section Settings
            </p>
         </header>
         <div class="card-content">
            @php
            $i = 1
            @endphp
            @if(count($pagesectionData) > 0)
            @foreach($pagesectionData as $key=>$value)

            <div class="field-group">
               <div class="field">
                  <label class="label">Page Section Title {{$i}}</label>
                  <div class="control">
                     <input class="input" name="pageSectionTitle[]" placeholder="Page Section Title {{$i}}" value="{{$value->pageSectionTitle}}">
                  </div>
               </div>
               <div class="field">
                  <label class="label">Page Section Content {{$i}}</label>
                  <div class="control">
                     <textarea class="textarea h-full resize-none flex-1" rows="9" id="summernote4" name="pageContentSection[]" placeholder="Page Section Description {{$i}}" role="text-output">{{$value->pageSectionContent}}</textarea>
                  </div>
               </div>
            </div>
            @php
            $i++
            @endphp
            @endforeach
            @else
            <div class="field-group">
               <div class="field">
                  <label class="label">Page Section Title 1</label>
                  <div class="control">
                     <input class="input" name="pageSectionTitle[]" placeholder="Page Section Title 1" value="">
                  </div>
               </div>
               <div class="field">
                  <label class="label">Page Section Content 1</label>
                  <div class="control">
                     <textarea class="textarea h-full resize-none flex-1" rows="9" id="summernote4" name="pageContentSection[]" placeholder="Page Section Description 1" role="text-output"></textarea>
                  </div>
               </div>
            </div>
            @endif
            <div class="field">
               <label class="label">Page Section Registration</label>
               <div class="control">
                  <textarea class="textarea h-full resize-none flex-1" rows="9" id="registration" name="registration" placeholder="Page Section Registration" role="text-output">{{$registration}}</textarea>
               </div>
            </div>
            <div id="dynamic-fields"></div>
            <button type="button" class="button blue" id="add-field">Add More</button>
         </div>
      </div>
      <hr>
      <div class="card mb-6">
         <header class="card-header">
            <p class="card-header-title">
               <span class="icon"><i class="mdi mdi-ballot-outline"></i></span>
               Page Additional Settings
            </p>
         </header>
         <div class="card-content">
            <div class="field">
               <label class="label">Image</label>
               <div class="field-body">
                  <div class="field file">
                     <label class="upload control">
                        <a class="button blue">
                           Upload
                        </a>
                        <input type="file">
                     </label>
                  </div>
               </div>
            </div>
            <div class="field">
               <label class="label">Status</label>
               <div class="control">
                  <div class="select">
                     <select name="status">
                        @foreach($data_publish as $key=>$value)
                        @if($status == $key)
                        <option value='{{$key}}' selected>{{$value}}</option>
                        @else
                        <option value='{{$key}}'>{{$value}}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
            </div>
            <div class="field grouped">
               <div class="control">
                  <button type="submit" class="button green">
                     Update
                  </button>
               </div>
               <div class="control">
                  <button type="reset" class="button red">
                     Reset
                  </button>
               </div>
            </div>
         </div>
      </div>
   </form>
   @php
   $pagecount = (!empty($pagesectionData)) ? count($pagesectionData) + 1 : 2
   @endphp
   
   <script type="text/javascript">
      $(document).ready(function() {
         let index = {
            {
               $pagecount
            }
         }; // Tracks the index for dynamic field names
         let summernote = 4;

         $('#add-field').click(function() {

            const fieldGroup = `
            <div class="field">
               <label class="label">Page Section Title ${index}</label>
               <div class="control">
                  <input class="input" id="pageSectionTitleid${index}" name="pageSectionTitle[]" placeholder="Page Section Title ${index}" value="">
               </div>
            </div>
            <div class="field">
               <label class="label">Page Section Content ${index}</label>
               <div class="control">
                  <textarea class="textarea h-full resize-x rounded-md" rows="9" id="summernote${summernote}" name="pageContentSection[]" placeholder="Page Section Description ${index}"></textarea>
               </div>
            </div>
      
         `;
            $('#dynamic-fields').append(fieldGroup);


            index++;
            summernote++;
         });


      });
   </script>

   @include('admin.layout.footer')