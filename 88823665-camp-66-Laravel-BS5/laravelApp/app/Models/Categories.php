<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * โมเดลหมวดหมู่สินค้า
 * 
 * โมเดลนี้แสดงถึงหมวดหมู่สินค้าในแอปพลิเคชัน
 * สืบทอดจากคลาส Model เพื่อจัดการการทำงานกับฐานข้อมูล
 */
class Categories extends Model
{
    /**
     * ตารางที่เกี่ยวข้องกับโมเดล
     * 
     * @var string
     */
    protected $table = 'categories';

    /**
     * กำหนดว่าควรเก็บเวลาที่สร้างและอัปเดตหรือไม่
     * ตั้งค่าเป็น false เนื่องจากไม่จำเป็นต้องใช้คอลัมน์ created_at และ updated_at
     * 
     * @var bool
     */
    public $timestamps = false;
}
