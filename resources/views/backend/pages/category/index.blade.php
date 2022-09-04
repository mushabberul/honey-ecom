@extends('backend.layouts.master')
@section('admin_title', 'Category List')

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_length{
            padding: 20px 0;
        }
    </style>
@endpush

@section('admin_content')
    <div class="row">
        <h2>Category List</h2>
        <div class="col-md-12 pb-3">
            <div class="d-flex justify-content-end">
                <a href="{{route('category.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    Add New Category
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Created</th>
                        <th>Title</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $categories->firstItem()+$loop->index }}</td>
                            <td>{{ $category->created_at->format('d-M-Y') }}</td>
                            <td>{{ $category->title }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        setting
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fa fa-trash"></i>
                                                Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('admin_script')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                pagingType: 'first_last_numbers',
            });
        });
    </script>
@endpush
