<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\ProductList;

/**
 * คอนโทรลเลอร์สินค้า
 *
 * คอนโทรลเลอร์นี้จัดการฟังก์ชันการจัดการสินค้า รวมถึงการแสดงรายการและสร้างสินค้า
 */
class ProductController extends Controller
{
    /**
     * แสดงรายการสินค้าทั้งหมดแยกตามหมวดหมู่
     *
     * @return \Illuminate\View\View
     */
    function index()
    {
        $products = ProductList::with('user')
            ->join('categories', 'product_list.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', 'product_list.name as name', 'product_list.user_id', 'product_list.id')
            ->get()
            ->groupBy('category_name');

        return view('product', compact('products'));
    }

    /**
     * บันทึกสินค้าใหม่ลงในฐานข้อมูล
     * สร้างหมวดหมู่ใหม่ถ้ายังไม่มี และเพิ่มสินค้าลงในหมวดหมู่
     *
     * @param Request $req คำขอที่เข้ามาพร้อมข้อมูลสินค้าและหมวดหมู่
     * @return \Illuminate\Http\RedirectResponse
     */
    function store(Request $req){
        // ตรวจสอบว่ามีหมวดหมู่อยู่แล้วหรือไม่
        $category = Categories::where('name', $req->category_name)->first();

        // ถ้าไม่มีหมวดหมู่ ให้สร้างใหม่
        if (!$category) {
            $category = new Categories();
            $category->name = $req->category_name;
            $category->save();
        }

        foreach($req->product_name as $value){
            // ตรวจสอบว่ามีสินค้าชื่อนี้ในหมวดหมู่นี้อยู่แล้วหรือไม่
            $existingProduct = ProductList::where('name', $value)
                ->where('category_id', $category->id)
                ->first();

            // สร้างสินค้าเฉพาะถ้ายังไม่มี
            if (!$existingProduct) {
                $product = new ProductList();
                $product->name = $value;
                $product->category_id = $category->id;
                $product->user_id = session('user')->id;
                $product->save();
            }
        }

        return redirect('/product')->with('success', 'Products saved successfully');
    }

    /**
     * ลบสินค้าออกจากระบบ
     *
     * @param Request $req คำขอที่เข้ามาพร้อมข้อมูลสินค้าที่ต้องการลบ
     * @return \Illuminate\Http\JsonResponse
     */
    function destroy(Request $req)
    {
        try {
            $product = ProductList::findOrFail($req->product_id);
            $product->delete();
            return response()->json(['success' => true, 'message' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete product'], 500);
        }
    }
}
