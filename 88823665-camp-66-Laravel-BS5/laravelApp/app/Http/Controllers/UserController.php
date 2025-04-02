<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * คอนโทรลเลอร์ผู้ใช้
 * 
 * คอนโทรลเลอร์นี้จัดการฟังก์ชันการจัดการผู้ใช้ รวมถึงการแสดงรายการ แก้ไข และลบผู้ใช้
 */
class UserController extends Controller
{
    /**
     * แสดงรายการผู้ใช้ทั้งหมด
     * 
     * @return \Illuminate\View\View
     */
    function index()
    {
        $users = User::all();
        $data['users'] = $users;
        return view('user', ['users' => $users]);
    }

    /**
     * แสดงฟอร์มแก้ไขสำหรับผู้ใช้ที่ระบุ
     * 
     * @param int $id รหัสผู้ใช้ที่ต้องการแก้ไข
     * @return \Illuminate\View\View
     */
    function edit($id)
    {
        $user = User::find($id);
        $data['user'] = $user;
        return view('edit', $data);
    }

    /**
     * จัดการการส่งฟอร์มแก้ไขผู้ใช้
     * 
     * @param Request $req คำขอที่เข้ามาพร้อมข้อมูลผู้ใช้ที่อัปเดต
     * @return \Illuminate\Http\RedirectResponse
     */
    function edit_action(Request $req)
    {
        $muser = User::find ($req -> id);
        $muser -> name = $req->name;
        $muser -> email = $req->email;
        $muser -> password = $req->password;
        $muser -> save();
        return redirect('/user');
    }

    /**
     * ลบผู้ใช้ที่ระบุ
     * 
     * @param Request $req คำขอที่เข้ามาพร้อมรหัสผู้ใช้ที่ต้องการลบ
     * @return \Illuminate\Http\RedirectResponse
     */
    function delete(Request $req)
    {
        $muser = User::find($req->id);
        $muser -> delete();
        return redirect('/user');
    }
}
