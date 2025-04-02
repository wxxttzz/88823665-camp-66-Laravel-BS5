@extends('layouts.default')
@section('title', 'CAMP-66 | Product')
@section('body', 'layout-fixed sidebar-expand-lg bg-body-tertiary')
@section('content')
    <div class="app-wrapper">
        @include('components.header')
        @include('components.menu')
        <main class="app-main">
            <div class="row">
                <h1 class="mt-5 ms-5 fw-bold">Product</h1>
            </div>

            <form action="{{ url('/product') }}" method="post" class="mt-3 ms-5" onsubmit="return swal(event)">
                @csrf
                <div class="row mt-3">
                    <!-- Category name selector -->
                    <div class="col-6">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="" disabled selected>Select a category</option>
                            {{-- Loop through each category in the products collection --}}
                            @foreach ($products as $categoryName => $items)
                                {{-- Create an option element for each category --}}
                                <option value="{{ $categoryName }}">{{ $categoryName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="category_name">Category name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" required />
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="button" id="btn-add-product-list">+ เพิ่ม Product</button>
                <div class="row mt-5 mr-4 align-items-center">
                    <p class="fst-italic col-1 mb-0">Product List</p>
                    <hr class="col mb-0 me-5">
                </div>
                <div class="row mt-1 align-items-center mr-4 me-3" id="product-list">
                    <div class="col-6 mt-3">
                        <label for="">Product name <button type="button"
                                class="btn btn-danger ms-2 mb-2 btn-del-product-list">Delete</button></label>
                        <input type="text" name="product_name[]" class="form-control" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 mb-3 col-1">Save</button>
            </form>
            <table class="table table-bordered me-5 ms-5 w-auto">
                <thead>
                    <tr class="fw-bold text-center">
                        <td>#</td>
                        <td>Category Name</td>
                        <td>ProductList Name</td>
                        <td>Add by</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $category => $items)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $category }}</td>
                            <td>
                                <ul class="list-group list-group-numbered">
                                    @foreach ($items as $product)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $product->name }}
                                            <button type="button" class="btn btn-outline-danger btn-sm delete-product"
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-x-circle align-middle px-2 "></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-center">{{ $items->first()->user->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </div>
@endsection
@section('scripts')
    <!-- add button js -->
    <script>
        $(document).ready(function() {
            // Event handler for category selector change
            // Updates the category_name input field with the selected category value
            $('#category_id').on('change', function() {
                const selectedCategory = $(this).val();
                $('#category_name').val(selectedCategory);
            });
        });
        $(document).ready(function() {
            // Add product button click handler
            // Adds a new product input field to the product list
            $('#btn-add-product-list').on('click', function() {
                $('#product-list').append(
                    `<div class="col-6 mt-3">
                    <label for="">Product name <button type="button" class="btn btn-danger ms-2 mb-2 btn-del-product-list">Delete</button></label>
                    <input type="text" name="product_name[]" class="form-control" required />
                </div>`)
            });

            // Delete product list item button handler
            // Removes the parent product input field when delete button is clicked
            $(document).on('click', '.btn-del-product-list', function() {
                $(this).parent().parent().remove();
            });

            // Product deletion handler
            // Shows confirmation dialog and sends AJAX request to delete product
            $('.delete-product').on('click', function() {
                const productId = $(this).data('product-id');
                Swal.fire({
                    title: "Delete product?",
                    text: "Are you sure you want to delete this product?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send AJAX request to delete the product
                        $.ajax({
                            url: '/product',
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                                product_id: productId
                            },
                            success: function(response) {
                                // Handle successful response
                                if (response.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: response.message,
                                        icon: "success"
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    // Handle error response
                                    Swal.fire({
                                        title: "Error!",
                                        text: response.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function() {
                                // Handle AJAX failure
                                Swal.fire({
                                    title: "Error!",
                                    text: "Failed to delete product",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
    <!-- SweetAlert2 library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Form submission confirmation dialog -->
    <script>
        function swal(event) {
            // Prevent default form submission
            event.preventDefault();
            // Show confirmation dialog
            Swal.fire({
                title: "Add products?",
                text: "Are you sure you want to add these products?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, do it!",
                cancelButtonText: "Hold on"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show success message and submit the form
                    Swal.fire({
                        title: "Added!",
                        text: "Your products has been added.",
                        icon: "success"
                    });
                    event.target.closest('form').submit();
                }
            });
        }
    </script>

    <!-- Field validation utility function -->
    <script>
        function validateField(selector, pattern = null) {
            // Get the field element
            const field = $(selector);
            const value = field.val().trim();
            // Reset previous validation classes
            field.removeClass('is-invalid is-valid');

            // Check if field is empty
            if (value === '') {
                field.addClass('is-invalid');
                return false;
            }

            // Check pattern if provided
            if (pattern && !pattern.test(value)) {
                field.addClass('is-invalid');
                return false;
            }

            // Mark field as valid
            field.addClass('is-valid');
            return true;
        }
    </script>
@endsection
