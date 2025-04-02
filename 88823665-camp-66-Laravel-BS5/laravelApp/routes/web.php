<?php
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\MyController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\RegisterController;
    use App\Http\Controllers\UserController;
    use App\Http\Middleware\CheckLogin;
    use Illuminate\Support\Facades\Route;

    Route::middleware([CheckLogin::class])->group(function () {
        Route::get("/product", [ProductController::class, 'index']);
        Route::post("/product", [ProductController::class, 'store']);
        Route::delete("/product", [ProductController::class, 'destroy']);
        Route::get("/dashboard", [HomeController::class, 'index']);
        Route::get("/user", [UserController::class, 'index']);
        Route::get("/user/{id}", [UserController::class, 'edit']);
        Route::put("/user", [UserController::class, 'edit_action']);
        Route::delete('/user', [UserController::class, 'delete']);
    });
    Route::get("/", function () {return redirect('dashboard');});
    Route::get("/login", [LoginController::class, 'index']);
    Route::post("/login", [LoginController::class, 'login']);
    Route::get("/logout", function () {
        session()->forget('user');
        return redirect('login');
    });
    Route::get("/home", function () {
        return redirect('dashboard');
    });

    Route::get("/register", [RegisterController::class, 'index']);
    Route::post("/register", [RegisterController::class, 'create']);

    Route::get("/500", [HomeController::class, 'error500']);
    Route::get("/404", [HomeController::class, 'error404']);
