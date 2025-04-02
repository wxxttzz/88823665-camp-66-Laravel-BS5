@extends('layouts.default')
@section('title')
    CAMP-66 | Edit
@endsection
@section('body')
    login-page bg-body-secondary
@endsection
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <h1><i class="bi bi-pencil-square"></i> Edit</h1>
        </div>
        <!-- /.register-logo -->
        <div class="card">

            <div class="card-body register-card-body">
                <p class="register-box-msg"><i class="bi bi-pen"></i> Editing:</p>
                <p class="text-center fw-bold">{{ $user->name }} <br><small class="fw-light"><span
                            class="text-wrap text-white rounded-5 ps-2 pe-2"
                            style="background-color: gray">{{ $user->email }}</span></small></p>
                <form action="{{ url('/user') }}" method="post" class="mt-4">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="input-group mb-3">
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                            placeholder="Full Name" />
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Email" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"><i
                                        class="bi bi-check-circle me-2"></i>Confirm</button>
                                <a href="{{ url('/user') }}" class="btn btn-danger ms-2"><i
                                        class="bi bi-x-circle me-2"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
