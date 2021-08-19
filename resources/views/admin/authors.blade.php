@extends('layouts.backend')
@section('title')
    All Authors - MBlog
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
                                <h5>Authors</h5>
                                <span>All Author below here</span>
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
                                <li class="breadcrumb-item active" aria-current="page">All authors</li>
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
                        <div class="card-header">
                            <h3>Authors Table</h3>
                        </div>
                        <div class="card-body">

                            <table id="data_table" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Total Posts</th>
                                    <th>Total Comments</th>
                                    <th>Total likes</th>
                                    <th>Last Modify</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="{{ asset('upload/users/'.$author->image) }}" class="table-user-thumb" alt="{{ $author->name }}">
                                        </td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>{{ $author->posts->count() }}</td>
                                        <td>{{ $author->comments->count() }}</td>
                                        <td>{{ $author->favorites->count() }}</td>
                                        <td>{{ $author->updated_at }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <button onclick="deleteItem({{$author->id}})" class="btn btn-outline-danger"><i class="ik ik-trash-2"></i></button>
                                                <form style="display: none;" id="delete-item-{{ $author->id }}" action="{{ route('admin.authors.destroy',$author->id) }}" method="POST">
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



