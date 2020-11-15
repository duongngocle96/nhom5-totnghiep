<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('admin.add_product');
    }

    public function all_product(){
        $this->AdminAuthCheck();
        $all_product_info =DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
        ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
        ->get();
        $manage_product = view('admin.all_product')
        ->with('all_product_info',$all_product_info);
        return view('admin_layout')
        ->with('admin.all_product',$manage_product);
        // return view('admin.all_product');
    }
}
