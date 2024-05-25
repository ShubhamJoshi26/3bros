@include('admin.layout.header')
<div class="page-wrapper">
    <div class="page-content">
    @include('admin.layout.alert')
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Places</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Place</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/admin/place/create" id="addtestimonials" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($place) && $place['id']!=''){echo $place['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Category</label>
                  <select name="category[]" id="category" class="form-control select2" multiple>
                    {!!$option!!}
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place) && $place['title']!=''){echo $place['title'];}?>" placeholder="Place Title" name="title">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Address</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place) && $place['address']!=''){echo $place['address'];}?>" placeholder="Place Address" name="address">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Capacity</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place) && $place['capacity']!=''){echo $place['capacity'];}?>" placeholder="Place Capacity" name="capacity">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Price</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place) && $place['price']!=''){echo $place['price'];}?>" placeholder="Place Price" name="price">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Position</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place) && $place['position']!=''){echo $place['position'];}?>" placeholder="Position" name="position">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Show On Home Page</label>
                  <select name="on_home_page" id="on_home_page" class="form-control select2">
                    <option value=""></option>
                    <option value="yes" <?php if(isset($place['on_home_page']) && $place['on_home_page']=='yes'){echo "selected='selected'";}?>>Yes</option>
                    <option value="no" <?php if(isset($place['on_home_page']) && $place['on_home_page']=='no'){echo "selected='selected'";}?>>No</option>
                  </select>
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Thumbnail</label>
                  <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Images</label>
                  <input class="form-control" type="file" id="images" name="images[]" multiple>
                </div>
                <?php 
                if(isset($place) && $place['thumbnail']!='')
                {
                  ?>

                  <div class="col-12 col-lg-6">
                  <a href="<?php echo URL::asset($place['thumbnail']); ?>">  <label for="" class="form-label mt-4"><?php if(isset($place) && $place['thumbnail']!=''){ $filename = explode('/',$place['thumbnail']); echo end($filename);}?></label></a>
                  </div>
                  <?php
                }
                ?>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place['metatitle']) && $place['metatitle']!=''){echo $place['metatitle'];}?>" placeholder="Meta Title" name="metatitle">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Keywords</label>
                  <input type="text" required class="form-control" id="metakeywords" 
                  value="<?php if(isset($place['metakeywords']) && $place['metakeywords']!=''){echo $place['metakeywords'];}?>" placeholder="Meta Keywords" name="metakeywords">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Description</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($place['metadescription']) && $place['metadescription']!=''){echo $place['metadescription'];}?>" placeholder="Meta Description" name="metadescription">
                </div>
                <div class="col-12 col-lg-12">
                  <label for="" class="form-label">Description</label>
                  <textarea class="texteditor" name="description" id="description"><?php if(isset($place) && $place['description']!=''){echo $place['description'];}?></textarea>
                </div>
                <div class="col-6 col-lg-6">
                  <label for="" class="form-label">Custom URL</label>
                  <input type="text" required class="form-control" id="customurl" 
                  value="<?php if(isset($place['customurl']) && $place['customurl']!=''){echo $place['customurl'];}?>" placeholder="Custom URL" name="customurl">
                </div>
                </div>
                <div class="row">
                <div class="col-12 col-lg-12"> &nbsp;
                </div>
                <div class="col-12 col-lg-2">
                <button class="btn btn-primary px-4" type="submit">Submit
                  </button>
                </div>
                </div>
            </form>
      </div>
        </div>
    </div>
</div>
@include('admin.layout.footer')