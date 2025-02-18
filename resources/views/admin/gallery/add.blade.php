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
            <li class="breadcrumb-item active" aria-current="page">Manage Gallery</li>
            <li class="breadcrumb-item active" aria-current="page">Add Gallery</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <form action="/admin/gallery/create" id="addtestimonials" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <input type='hidden' name='id' value='<?php if (isset($gallery) && $gallery->id != '') {
                                                    echo $gallery->id;
                                                  } ?>' />
            <div class="col-12 col-lg-6">
              <label for="" class="form-label">Title</label>
              <input type="text" required class="form-control" id="title" value="<?php if (isset($gallery) && $gallery->title != '') {
                                                                                    echo $gallery->title;
                                                                                  } ?>" placeholder="Place Title" name="title">
            </div>
            <div class="col-12 col-lg-6">
              <label for="" class="form-label">Thumbnail</label>
              <input class="form-control" type="file" id="thumbnail" name="thumbnail">
            </div>
            <div class="col-12 col-lg-6">
              <label for="" class="form-label">Images</label>
              <input class="form-control" type="file" id="images" name="images[]" multiple>
            </div>
            <!--  -->
            <div class="col-12 col-lg-12">
              <label for="" class="form-label">Description</label>
              <textarea class="texteditor" name="description" id="description"><?php if (isset($gallery) && $gallery['description'] != '') {
                                                                                  echo $gallery['description'];
                                                                                } ?></textarea>
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
    @if(isset($galleryimages) && !empty($galleryimages))
    <div class="card">
      <div class="card-body">
            <div class="row">
            @foreach($galleryimages as $img)
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="{{URL::asset($img['path'])}}" alt="Card image cap">
              <div class="card-body">
                <a href="/admin/gallery/image/delete?id={{$img['id']}}" class="btn btn-primary">Delete</a>
              </div>
            </div>
            @endforeach
            </div>
      </div>
    </div>
    @endif
  </div>
</div>



@include('admin.layout.footer')