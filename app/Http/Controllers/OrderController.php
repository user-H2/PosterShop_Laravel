<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
use App\Models\Donhangchitiet;

class OrderController extends Controller
{
    public function qldonhang(){
        $db = Donhang::orderby('ngaydat','desc')->get();
        return view('admin.donhang.index', ['donhang'=>$db]);
    }

    public function qldonhangchitiet($id){
        $donhang = Donhang::find($id);
        $chitiet = Donhangchitiet::where('iddon', $id)->get();
        return view('admin.donhang.donhangchitiet', ['donhang'=>$donhang, 'chitiet'=>$chitiet]);
    }
}
