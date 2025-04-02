@extends('layouts.default')
@section('title')
    CAMP-66 | Register
@endsection
@section('body')
    login-page bg-body-secondary
@endsection
@section('content')
    <div class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../index2.html"><b>Admin</b>LTE</a>
            </div>
            <!-- /.register-logo -->
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="register-box-msg">Register a new membership</p>
                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="name" id= "name"oninput="return checkname();"
                                class="form-control" placeholder="Full Name" />
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">
                                กรุณาระบุข้อมูล ชื่อ-สกุล
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email"
                                class="form-control"oninput="return checkemail();" placeholder="Email" />
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">
                                กรุณาระบุข้อมูล หรือ กรอก email ให้ถูกต้อง
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" oninput="return clickpass();"
                                class="form-control" placeholder="Password" />
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                            <div class="valid-feedback">
                                รหัสผ่านแข็งแรงมาก
                            </div>
                            <div class="invalid-feedback">
                                กรุณาระบุข้อมูล หรือ password ต้องมี ตัวเล็ฌกับตัวใหญ่ และ ตัวเล็ก อย่างน้อย 8 ตัว
                            </div>
                        </div>
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2" onclick="return checkValue()">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>
                    {{-- <button type="button" class="btn btn-danger" onclick="clickme()"> cilck me</button> --}}
                    <!-- /.social-auth-links -->
                    <p class="mb-0">
                        <a href="login.html" class="text-center"> I already have a membership </a>
                    </p>
                </div>
                <!-- /.register-card-body -->
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // Generic validation function
        function validateField(selector, pattern = null) {
            const field = $(selector);
            const value = field.val().trim();
            field.removeClass('is-invalid is-valid');

            if (value === '') {
                field.addClass('is-invalid');
                return false;
            }

            if (pattern && !pattern.test(value)) {
                field.addClass('is-invalid');
                return false;
            }

            field.addClass('is-valid');
            return true;
        }

        // Field specific validations
        function checkname() {
            return validateField('#name');
        }

        function checkemail() {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
            return validateField('#email', emailPattern);
        }

        function clickpass() {
            const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            return validateField('#password', passwordPattern);
        }

        function checkValue() {
            const checkbox = document.getElementById("flexCheckDefault");
            if (!checkbox.checked) {
                Swal.fire({
                    icon: "{{}}",
                    title: "Please agree to the terms",
                });
                return false;
            }
            return true;
        }
    </script>
@endsection
