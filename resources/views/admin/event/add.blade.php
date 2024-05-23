
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Events</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Event</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
      <div class="card-body">
            <form action="/admin/event/create" id="addtestimonials" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="row">
                <input type='hidden' name='id' value='<?php if(isset($event) && $event['id']!=''){echo $event['id'];}?>'/>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Title</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($event) && $event['title']!=''){echo $event['title'];}?>" placeholder="Event Title" name="title">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Date</label>
                  <input type="text" required class="form-control datepicker-other" id="date"
                  value="<?php if(isset($event['date']) && $event['date']!=''){echo date('Y-m-d',strtotime($event['date']));}?>" placeholder="Event Date" name="date">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Thumbnail</label>
                  <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                </div>
                <?php 
                if(isset($event) && $event['thumbnail']!='')
                {
                  ?>

                  <div class="col-12 col-lg-6">
                  <a href="<?php echo URL::asset($event['thumbnail']); ?>">  <label for="" class="form-label mt-4"><?php if(isset($event) && $event['thumbnail']!=''){ $filename = explode('/',$event['thumbnail']); echo end($filename);}?></label></a>
                  </div>
                  <?php
                }
                ?>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Location</label>
                  <input type="text" required class="form-control" id="location" 
                  value="<?php if(isset($event) && $event['location']!=''){echo $event['location'];}?>" placeholder="Location" name="location">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Event Timing</label>
                  <input type="text" required class="form-control" id="time" 
                  value="<?php if(isset($event) && $event['time']!=''){echo $event['time'];}?>" placeholder="Event Timing" name="time">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Ticket Price</label>
                  <input type="text" required class="form-control" id="price" 
                  value="<?php if(isset($event) && $event['price']!=''){echo $event['price'];}?>" placeholder="Ticket Price" name="price">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Keyword</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($event['metatitle']) && $event['metatitle']!=''){echo $event['metatitle'];}?>" placeholder="Meta Title" name="metatitle">
                </div>
                <div class="col-12 col-lg-6">
                  <label for="" class="form-label">Meta Description</label>
                  <input type="text" required class="form-control" id="title" 
                  value="<?php if(isset($event['metadescription']) && $event['metadescription']!=''){echo $event['metadescription'];}?>" placeholder="Meta Description" name="metadescription">
                </div>
                <div class="col-12 col-lg-12">
                  <label for="" class="form-label">Description</label>
                  <textarea class="texteditor" name="description" id="description"><?php if(isset($event) && $event['description']!=''){echo $event['description'];}?></textarea>
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