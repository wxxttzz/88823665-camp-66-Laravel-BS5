@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
@endsection
@section('body', 'layout-fixed sidebar-expand-lg bg-body-tertiary')
@section('content')
    <div class="app-wrapper">
        @include('components.header')
        @include('components.menu')
        <main class="app-main">
            <div class="row mb-5 gap-0">
                <h1 class="mt-5 ms-5 fw-bold">User <br><small class="fw-light">Management</small></h1>
            </div>
            <!--begin::Row-->
            <div class="row ms-4">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">🔥 User list :</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $index => $user) { ?>
                                    <tr class="align-middle">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ url('/user/' . $user->id) }}" style="text-decoration: none;">
                                                <button class="btn-warning btn"> Edit</button>
                                            </a>
                                            <form action="{{ url('/user') }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="btn-danger btn" onclick="clickme(event)">
                                                    Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!--end::Row-->
        </main>
        @include('components.footer')
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function clickme(event) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
@endsection
