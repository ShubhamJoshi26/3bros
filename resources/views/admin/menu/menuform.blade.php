{{--
<x-app-layout>
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
</x-app-layout>
--}}
@include('admin.layout.header')
@php
$name = (old('name') != '' ) ? old('name') : "";
$menu_parent_id = (old('menu_parent_id') != '' ) ? old('menu_parent_id') : "";
$menuType = (old('menuType') != '' ) ? old('menuType') : "";
$sort_order = (old('sort_order') != '') ? old('sort_order') : "";
$publish = (old('status') != '' ) ? old('status') : "";
$position = (old('position') != '' ) ? old('position') : "";
$premalinkname = array("page"=>"Page");
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
                  <li class="breadcrumb-item active" aria-current="page">Add Menu</li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">

               <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                  @foreach ($errors->all() as $error)
                  <p><span class="font-medium">Error!</span> {{ $error }}</p>
                  @endforeach
               </div>
            </div>
            @endif
            <form method='POST' id="blog" name="blog" class="form-horizontal" action='{!!  url('admin/menu/submit') !!}'>
               @CSRF
               <input type="hidden" name="_token" value="{!! csrf_token() !!}">
               <input type="hidden" name="sort_order" value="0">
               <div class="row">
                  
               <div class="form-group col-md-6">
                  <label class="form-label">Menu Name</label>
                  <div class="control icons-left">
                     <input class="input form-control" type="text" name="name" placeholder="Name" value="{{$name}}">
                     <span class="icon left"><i class="mdi mdi-menu"></i></span>
                     @error('name')
                     <div class="text-sm text-red-600">The Menu Name field is required.</div>
                     @enderror
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
                     @error('menu_parent_id')
                     <div class="text-sm text-red-600">The Parents is required.</div>
                     @enderror
                  </div>
               </div>
               <div class="form-group col-md-6" id="positioninput" style="display:none;">
               <label class="form-label">Position</label>
               <input class="form-control"  name="position" placeholder="Menu Position" value="{{$position}}" ></div>
               <div class="form-group col-md-6">
                  <label class="form-label">Menu Type</label>
                  <div class="control">
                     <div class="select">
                        <select class="form-control select2" name="menuType" id="premalink">
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
                     @error('menuType')
                     <div class="text-sm text-red-600">The Menu Type is required.</div>
                     @enderror
                  </div>
               </div>
               <div class="form-group col-md-6" id="premalinkidothers" style="display:none;"> </div>
               <div class="form-group col-md-6" id="premalinkid" style="display: none;"></div>
               <div class="form-group col-md-6">
                  <label class="form-label">Publish</label>
                  <div class="control">
                     <div class="select">
                        <select name="status" class="form-control select2">
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
               <div class="form-group grouped mt-3">
                  <div class="control">
                     <button type="submit" class="button green btn btn-success">
                        Submit
                     </button>
                     <button type="reset" class="button red btn btn-danger">
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

<script>
   $(document).ready(function() {
      $('#premalink').change(function() {
         $('#premalinkidothers').hide();
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
                  
                  $('#premalinkid').show();
                  $('#premalinkid').html(data);
               }
            });
         }
      });
      $('#menu_parent_id').change(function() {
         $('#premalinkidothers').hide();
         var premalinkPage = $(this).val();
         if (premalinkPage == 0) {
            $('#positioninput').show();
         }
         else
         {
            $('#positioninput').hide();
         }
      });
      if($('#menu_parent_id').val()==0)
      {
         $('#positioninput').show();
      }
   });
</script>
@include('admin.layout.footer')