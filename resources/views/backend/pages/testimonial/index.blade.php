@extends('backend.layouts.master')
@section('admin_title', 'Testimonial List')

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_length{
            padding: 20px 10px;
        }
    </style>
@endpush

@section('admin_content')
    <div class="row">
        <h2>Testimonial List</h2>
        <div class="col-md-12 pb-3">
            <div class="d-flex justify-content-end">
                <a href="{{route('testimonial.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus-circle"></i>
                    Add New Testimonial
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Created</th>
                        <th>Client Name</th>
                        <th>Client Image</th>
                        <th>Client Designation</th>
                        <th>Client Message</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonials->firstItem()+$loop->index }}</td>
                            <td>{{ $testimonial->created_at->format('d-M-Y') }}</td>
                            <td>{{ $testimonial->client_name }}</td>
                            <td>
                                <img class="rounded-circle" src="{{ asset('uploads/testimonial').'/'. $testimonial->client_image }}" alt="client image">
                            </td>
                            <td>{{ $testimonial->client_designation }}</td>
                            <td>{{ $testimonial->client_message }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        setting
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{route('testimonial.edit',$testimonial->client_name_slug)}}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{route('testimonial.destroy',$testimonial->client_name_slug)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item show_confirm">
                                                   <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                pagingType: 'first_last_numbers',
            });
        });

        $('.show_confirm').click(function(event){
            let form = $(this).closest('form')
            event.preventDefault()

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
                form.submit()
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
        });
    </script>
@endpush
