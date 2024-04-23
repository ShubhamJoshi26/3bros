@include('admin.layout.header')
@php
$pageTitle = (old('pageTitle') != '' ) ? old('pageTitle') : "";
$pageParent = (old('pageParent') != '' ) ? old('pageParent') : "";
$pageURL = (old('pageURL') != '' ) ? old('pageURL') : "";
$pageContent = (old('pageContent') != '') ? old('pageContent') : "";
$pageContent2 = (old('pageContent2') != '') ? old('pageContent2') : "";
$pageContent3 = (old('$pageContent3') != '') ? old('$pageContent3') : "";
$pageMetaTitle = (old('pageMetaTitle') != '' ) ? old('pageMetaTitle') : "";
$pageMetaDescription = (old('pageMetaDescription') != '' ) ? old('pageMetaDescription') : "";
$pageMetaKeywords = (old('pageMetaKeywords') != '' ) ? old('pageMetaKeywords') : "";
$registration = (old('registration') != '' ) ? old('registration') : "";
$status = (old('status') != '' ) ? old('status') : "";

$pageType = (old('pageType') != '' ) ? old('pageType') : "";
$page_array = array(""=>"Select Page","normalpage"=>"Normal Page","certifiedpage"=>"Certified Page");

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
                  <li class="breadcrumb-item active" aria-current="page">Manage Pages</li>
                  <li class="breadcrumb-item active" aria-current="page">Add Page</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
         <form method='POST' id="page" name="page" class="form-horizontal" action='{!!  url(' admin/page/submit') !!}' enctype="multipart/form-data">
         @CSRF
               @if ($errors->any())
               <div class="alert alert-danger">
                  <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                     @foreach ($errors->all() as $error)
                     <p><span class="font-medium">Error!</span> {{ $error }}</p>
                     @endforeach
                  </div>
               </div>
               @endif
               <div class="form-group">
                  <label class="form-label">Page Title</label>
                  <div class="control">
                     <input class="form-control" placeholder="Page Title" name="pageTitle" value="{{$pageTitle}}">
                  </div>
                  @error('pageTitle')
                  <span class="text-red-500">The page title field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Page Type</label>
                  <div class="control">
                     <div class="select">
                        <select name="pageType" class="form-control select2">
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
               <div class="form-group">
                  <label class="form-label">Page Url</label>
                  <div class="control ">
                     <input class="form-control" placeholder="Page Url" name="pageURL" value="{{$pageURL}}">
                  </div>
                  <p class="help">
                     Please enter custom value url like or Enter title copy paste (Contact,IPL 2022,Portfolio)
                  </p>
                  @error('pageTitle')
                  <span class="text-red-500">The Page Url field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Parents</label>
                  <div class="control">
                     <div class="select" >
                        @if($pageparentdata =="")
                        <select name="pageParent" class="form-control select2">
                           <option value="0">None</option>
                        </select>
                        @else
                        {!! $pageparentdata !!}
                        @endif
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="form-label">Page Content 1</label>
                  <div class="control">
                     <textarea class="form-control texteditor textarea" rows="10" id="summernote1" name="pageContent" placeholder="Page Description">{{$pageContent}}</textarea>
                  </div>
                  @error('pageContent')
                  <span class="text-red-500">The Page Content field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Page Content 2</label>
                  <div class="control">
                     <textarea class="form-control texteditor textarea" rows="10" id="summernote2" name="pageContent2" placeholder="Page Description 2">{{$pageContent2}}</textarea>
                  </div>
                  @error('pageContent')
                  <span class="text-red-500">The Page Content field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Page Content 3</label>
                  <div class="control">
                     <textarea class="form-control texteditor textarea" rows="10" id="summernote3" name="pageContent3" placeholder="Page Description 3">{{$pageContent3}}</textarea>
                  </div>
                  @error('pageContent3')
                  <span class="text-red-500">The Page Content3 field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Page Meta Title</label>
                  <div class="control">
                     <input class="form-control" name="pageMetaTitle" placeholder="Page Meta Title" value="{{$pageMetaTitle}}">
                  </div>
                  @error('pageMetaTitle')
                  <span class="text-red-500">The Page Meta Title field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Meta Description</label>
                  <div class="">
                     <textarea class="textarea form-control" rows="3" name="pageMetaDescription" placeholder="Page Meta Description">{{$pageMetaDescription}}</textarea>
                  </div>
                  @error('pageMetaDescription')
                  <span class="text-red-500">The Page Meta Description field is required.</span>
                  @enderror
               </div>
               <div class="form-group">
                  <label class="form-label">Meta Keywords</label>
                  <div class="control">
                     <textarea class="textarea form-control" rows="3" name="pageMetaKeywords" placeholder="Page Meta Keywords">{{$pageMetaKeywords}}</textarea>
                  </div>
               </div>
               <div class="field-group">
                  <div class="form-group">
                     <label class="form-label">Page Section Title 1</label>
                     <div class="control">
                        <input class="form-control" name="pageSectionTitle[]" placeholder="Page Section Title 1" value="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="label">Page Section Content 1</label>
                     <div class="control">
                        <textarea class="textarea form-control texteditor h-full resize-none flex-1" rows="9" id="summernote4" name="pageContentSection[]" placeholder="Page Section Description 1" role="text-output"></textarea>
                     </div>
                  </div>
                  <div id="dynamic-fields"></div>
                  <button type="button" class="button blue btn btn-primary mt-1" id="add-field">Add More</button>
                  <div class="form-group">
                     <label class="form-label">Page Section Registration</label>
                     <div class="control">
                        <textarea class="textarea form-control texteditor h-full resize-none flex-1" rows="9" id="registration" name="registration" placeholder="Page Section Registration" role="text-output">{{$registration}}</textarea>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="form-label">Image</label>
                  <input type="file" name="picture" id="picture" class="form-control file">
               </div>
               <div class="form-group">
                  <label class="form-label">Status</label>
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
               <div class="field grouped ">
                  <div class="form-group mt-3">
                     <button type="submit" class="button btn btn-success green">
                        Submit
                     </button>
                     <button type="reset" class="button btn btn-danger red">
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
<script type="text/javascript">
   $(document).ready(function() {
      let index = 2; // Tracks the index for dynamic field names
      let summernote = 4;

      $('#add-field').click(function() {

         const fieldGroup = `
            <div class="form-group">
               <label class="form-label">Page Section Title ${index}</label>
               <div class="control">
                  <input class="form-control" id="pageSectionTitleid${index}" name="pageSectionTitle[]" placeholder="Page Section Title ${index}" value="">
               </div>
            </div>
            <div class="form-group">
               <label class="form-label">Page Section Content ${index}</label>
               <div class="control">
                  <textarea class="textarea form-control texteditor h-full resize-x rounded-md" rows="9" id="summernote${summernote}" name="pageContentSection[]" placeholder="Page Section Description ${index}"></textarea>
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