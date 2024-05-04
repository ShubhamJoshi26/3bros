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
                        <li class="breadcrumb-item active" aria-current="page">Manage Footer Menu</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Footer Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/admin/footermenu/create" id="addtestimonials" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($menu) && $menu['id']!=''){echo $menu['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Location</label>
                  {!!$location!!}
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($menu) && $menu['title']!=''){echo $menu['title'];}?>" placeholder="Menu Title" name="title">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="InputLanguage" class="form-label">Status</label>
                  <select class="form-select" id="InputLanguage" aria-label="Default select example" name="status">
                    <option selected>--Select Status--</option>
                    <option value="active" <?php if(isset($menu) && $menu['status']=='active'){echo 'selected';}?>>Active</option>
                    <option value="inactive" <?php if(isset($menu) && $menu['status']=='inactive'){echo 'selected';}?>>Inactive</option>
                  </select>
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