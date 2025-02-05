<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gita</title>

    <!-- Font -->
    <link href="{{ asset('assets/admin/css/fonts.css') }}" rel="stylesheet">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

</head>
<body>
    
<!-- Table -->

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-responsive datatable-custom fz--14px" style="padding: 2rem 3rem 0 3rem">

    <a href="{{ route('users.create') }}" class="btn btn-primary" style="margin-bottom: 1.5rem">Create User</a>

    <table id="datatable" 
        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
        
        <thead class="thead-light">
            <tr>
                <th class="table-column-ph-10">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody id="set-rows">

        </tbody>
    </table>

</div>
<!-- End Table -->

<script type="text/javascript">

    var table = $('#datatable').DataTable({
        paging: true,
        serverSide: true,
        responsive: true,
        autoWidth: true,
        ajax: {
            url: "{{ route('users.index') }}",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    })
    
</script>

</body>
</html>