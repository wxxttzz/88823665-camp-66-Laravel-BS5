<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

/**
 * คอนโทรลเลอร์การเข้าสู่ระบบ
 * 
 * คอนโทรลเลอร์นี้จัดการการยืนยันตัวตนและการเข้าสู่ระบบ
 */
class LoginController extends Controller
{
    /**
     * แสดงฟอร์มเข้าสู่ระบบ
     * 
     * @return \Illuminate\View\View
     */
    function index()
    {
        return view('login');
    }

    /**
     * จัดการการส่งฟอร์มเข้าสู่ระบบ
     * ตรวจสอบการยืนยันตัวตนและเปลี่ยนเส้นทางไปยังแดชบอร์ดเมื่อสำเร็จ
     * 
     * @param Request $req คำขอที่เข้ามาพร้อมข้อมูลการเข้าสู่ระบบ
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            session(['error' => 'Your email or password is incorrect']);
            return view('login', ['email' => $req->email]);
            return redirect('login');
        }
        session()->forget('error');
        session(['user' => $user]);
        return redirect('dashboard');
    }
}
