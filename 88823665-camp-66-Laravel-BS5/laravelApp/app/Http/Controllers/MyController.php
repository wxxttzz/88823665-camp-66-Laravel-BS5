<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * คอนโทรลเลอร์ตารางคูณ
 * 
 * คอนโทรลเลอร์นี้จัดการฟังก์ชันการแสดงตารางคูณ
 */
class MyController extends Controller
{
    /**
     * แสดงหน้าตารางคูณ
     * 
     * @param Request $req คำขอที่เข้ามา
     * @return \Illuminate\View\View
     */
    function myFunction(Request $req)
    {
        return view('multable');
    }

    /**
     * แสดงตารางคูณด้วยตัวเลขที่ระบุ
     * 
     * @param Request $req คำขอที่เข้ามาพร้อมตัวเลขที่ต้องการคูณ
     * @return \Illuminate\View\View
     */
    function assign(Request $req)
    {
        $number = $req->typeNumber;
        return view('multable', ['number'=>$number]);
    }
}
abstract class Controller
{
    //
}
