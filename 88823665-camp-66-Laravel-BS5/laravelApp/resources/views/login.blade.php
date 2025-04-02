{{-- เทมเพลตหน้าเข้าสู่ระบบ --}}
{{-- เทมเพลตนี้แสดงฟอร์มสำหรับผู้ใช้ในการยืนยันตัวตน --}}

@extends('layouts.default')

@section('title')
    CAMP-66 | Login
@endsection

@section('body')
    login-page bg-body-secondary
@endsection

@section('content')
    {{-- กล่องเข้าสู่ระบบ --}}
    <div class="login-box">
        {{-- โลโก้เข้าสู่ระบบ --}}
        <div class="login-logo">
            <a href="{{ url('login') }}"><b>Camp</b> - 66</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                {{-- แสดงข้อความผิดพลาด --}}
                <?php
                $error = Session::get('error');
                if ($error) {
                    echo '<div class="alert alert-danger">' . $error . '</div>';
                    Session::put('error', null);
                }
                ?>
                {{-- ฟอร์มเข้าสู่ระบบ --}}
                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    {{-- ช่องกรอกอีเมล --}}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            value="{{ isset($email) ? $email : '' }}" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    {{-- ช่องกรอกรหัสผ่าน --}}
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
                <p class="mb-0">
                    <a href="{{ url('register') }}" class="text-center"> Register a new membership </a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
