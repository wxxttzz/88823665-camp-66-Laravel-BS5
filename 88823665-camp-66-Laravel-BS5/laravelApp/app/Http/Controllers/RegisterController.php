<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

/**
 * คอนโทรลเลอร์การลงทะเบียน
 * 
 * คอนโทรลเลอร์นี้จัดการฟังก์ชันการลงทะเบียนผู้ใช้
 */
class RegisterController extends Controller
{
    /**
     * แสดงฟอร์มลงทะเบียน
     * 
     * @return \Illuminate\View\View
     */
    function index()
    {
        return view('register');
    }

    /**
     * จัดการการส่งฟอร์มลงทะเบียน
     * สร้างผู้ใช้ใหม่และเปลี่ยนเส้นทางไปยังแดชบอร์ดผู้ใช้
     * 
     * @param Request $req คำขอที่เข้ามาพร้อมข้อมูลการลงทะเบียน
     * @return \Illuminate\Http\RedirectResponse
     */
    function create(Request $req)
    {
        $obj_user = new User();
        $obj_user->name = $req -> input('name');
        $obj_user->email = $req -> input('email');
        $obj_user->password = $req -> input('password');
        $obj_user->save();
        return redirect('user');
    }
}
