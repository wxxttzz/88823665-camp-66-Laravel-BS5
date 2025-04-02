<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * คอนโทรลเลอร์หน้าแรก
 * 
 * คอนโทรลเลอร์นี้จัดการหน้าหลักและหน้าข้อผิดพลาดของแอปพลิเคชัน
 */
class HomeController extends Controller
{
    //function __construct()
    //{
    //    $user = session()->get('user');
    //    if(!isset($user)){
    //        redirect('/login')->send();
    //    }
    //}

    /**
     * แสดงหน้าแดชบอร์ด
     * 
     * @return \Illuminate\View\View
     */
    function index()
    {
        return view('dashboard');
    }

    /**
     * แสดงหน้าข้อผิดพลาด 404
     * 
     * @return \Illuminate\View\View
     */
    function error404()
    {
        return view('errors.404');
    }

    /**
     * แสดงหน้าข้อผิดพลาด 500
     * 
     * @return \Illuminate\View\View
     */
    function error500()
    {
        return view('errors.500');
    }
}
