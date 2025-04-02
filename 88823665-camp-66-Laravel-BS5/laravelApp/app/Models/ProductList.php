<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * โมเดลรายการสินค้า
 * 
 * โมเดลนี้แสดงถึงสินค้าในแอปพลิเคชัน
 * สืบทอดจากคลาส Model เพื่อจัดการการทำงานกับฐานข้อมูล
 */
class ProductList extends Model
{
    /**
     * ตารางที่เกี่ยวข้องกับโมเดล
     * 
     * @var string
     */
    protected $table = 'product_list';

    /**
     * คุณสมบัติที่สามารถกำหนดค่าได้ผ่านการกำหนดค่าพร้อมกัน
     * 
     * @var array
     */
    protected $fillable = ['category_id', 'user_id', 'name'];

    /**
     * กำหนดว่าควรเก็บเวลาที่สร้างและอัปเดตหรือไม่
     * ตั้งค่าเป็น false เนื่องจากไม่จำเป็นต้องใช้คอลัมน์ created_at และ updated_at
     * 
     * @var bool
     */
    public $timestamps = false;

    /**
     * รับความสัมพันธ์กับผู้ใช้ที่เป็นเจ้าของสินค้า
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * รับความสัมพันธ์กับหมวดหมู่ที่เป็นเจ้าของสินค้า
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
