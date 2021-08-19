@extends('layouts.backend')
@section('title')
    All categories - MBlog
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            {{--             breadcrumb start here--}}
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-file-text bg-blue"></i>
                            <div class="d-inline">
                                <h5>Categories</h5>
                                <span>All categories below here</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/home') }}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard')  }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Categories</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{--             breadcrumb end here--}}
            {{--             Content start here--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Categories Table</h3>
                            <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-sm"><i class="ik ik-plus"></i>Create new categories</a>
                        </div>
                        <div class="card-body">

                            <table id="data_table" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Post Count</th>
                                    <th>Created Date</th>
                                    <th>Last Modify</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id  }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->posts->count() }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="{{ route('admin.category.edit',$category->slug) }}" class="btn text-secondary  btn-outline-primary"><i class="ik ik-edit-2"></i></a>
                                                <button onclick="deleteItem({{$category->id}})" class="btn btn-outline-danger"><i class="ik ik-trash-2"></i></button>
                                                <form style="display: none;" id="delete-item-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--             Content end here--}}
        </div>
    </div>

    @push('jsUp')
        <script src="{{ asset('assets') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/plugins/sweetalert/dist/sweetalert.min.js"></script>
    @endpush
    @push('script')
        <script>
            function deleteItem(id) {
                swal({
                    title: "Are you sure?",
                    text: "Do you really want to delete this item?",
                    icon: "warning",
                    buttons: ["Cancel", "Delete Now"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            event.preventDefault();
                            document.getElementById('delete-item-'+id).submit();
                            swal({
                                title: "Deleted",
                                text: "The list item has been deleted!",
                                icon: "success",
                            });
                        } else {
                            swal("The item is not deleted!");
                        }
                    });
            }
            $(document).ready(function() {
                let table = $('#data_table').DataTable({
                    responsive: true,
                    select: true,
                    'aoColumnDefs': [{
                        'bSortable': false,
                        'aTargets': ['nosort']
                    }]
                });
            });
        </script>
    @endpush
@endsection



