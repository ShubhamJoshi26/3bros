@include('admin.layout.header')
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
                        <li class="breadcrumb-item active" aria-current="page">All Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
        @if (session('success'))
      <div class="alert alert-success m-3" role="alert">
      <div  role="alert">
            {{ session('success') }}
            </div>
       </div>
    @endif
            <div class="card-body">
                <div class="w-full text-right mb-12 left-10 top-5">
                  <a href = "{{url('/')}}/admin/menu/add" class = "button medium textual --jb-notification-dismiss">Create Menu</a>
                </div>
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table id="project_table" class="table table-striped table-bordered dataTable menu_datatable" style="width:100%" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr>
                                 <th>Menu ID</th>
                                 <th>Menu Name</th>
                                 <th>Menu Type</th>
                                 <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
   $(function () {
     var table = $('.menu_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('listmenu') }}",
         columns: [
             {data: 'menuid', name: 'menuid'},
             {data: 'name', name: 'name'},
             {data: 'menuType', name: 'menuType', sortable: false, searchable: false},
             {data: 'action', name: 'action', sortable: false, searchable: false },
         ]
     });
   });
   
     function ConfirmDelete()
     {
         var result = confirm("Are you sure you want to delete?");
         if (result==true) {
             return true;
         } else {
             return false;
         }
     }
</script>
@include('admin.layout.footer')