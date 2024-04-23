
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
                        <li class="breadcrumb-item active" aria-current="page">Manage Pages</li>
                        <li class="breadcrumb-item active" aria-current="page">All Pages</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
        @if (session('success'))
      <div class="alert alert-success" role="alert">
      <div class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
            <span class="mr-2 h-4 w-4 fill-current">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
            </svg>
            </span>
            {{ session('success') }}
            </div>
       </div>
    @endif
            <div class="card-body">
                <div class="w-full text-right mb-12 left-10 top-5">
                  <a href = "{{url('/')}}/admin/page/add" class = "button medium textual --jb-notification-dismiss">Create Page</a>
                </div>
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <table id="project_table" class="table table-striped table-bordered dataTable menu_datatable" style="width:100%" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr>
                                  <th>Page ID</th>
                                  <th>Page Name</th>
                                  <th>Page Url</th>
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
        ajax: "{{ route('listpage') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'pageTitle', name: 'pageTitle'},
            {data: 'pageURL', name: 'pageURL',sortable: false, searchable: false},
            {data: 'action', name: 'action', sortable: false, searchable: false},
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