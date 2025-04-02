<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * โมเดลผู้ใช้
 * 
 * โมเดลนี้แสดงถึงผู้ใช้ในแอปพลิเคชัน
 * สืบทอดจากคลาส Authenticatable เพื่อจัดการการยืนยันตัวตน
 */
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * คุณสมบัติที่สามารถกำหนดค่าได้ผ่านการกำหนดค่าพร้อมกัน
     * ฟิลด์เหล่านี้สามารถกรอกได้โดยใช้วิธีการกำหนดค่าพร้อมกัน
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * คุณสมบัติที่ควรซ่อนไว้สำหรับการแปลงเป็น JSON
     * ฟิลด์เหล่านี้จะไม่รวมในการแสดงผลแบบ JSON/array
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * รับคุณสมบัติที่ควรแปลงเป็นประเภทข้อมูล
     * กำหนดวิธีการแปลงคุณสมบัติบางอย่างเป็นประเภทข้อมูลเฉพาะ
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
