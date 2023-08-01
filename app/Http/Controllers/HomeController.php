<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_sp;
use App\Models\san_pham;

class HomeController extends Controller
{
    public function index(){
        $ds = san_pham::limit(8)->orderby('unit_price','asc')->get();
        $spmoi = san_pham::limit(8)->orderby('created_at','desc')->get();
        $loaisp = loai_sp::all();
        return view('client.index',['sanphams'=>$ds, 'sanphammoi'=>$spmoi, 'loaisanpham'=>$loaisp]);
    }
    public function shop(){
        return view('client.shop');
    }
    public function categories($id){
        $loaisp = loai_sp::all();
        $sanpham = san_pham::where('id_loai_sp', $id)->paginate(9);
        return view('client.shop',['loaisanpham'=>$loaisp, 'sanphams'=>$sanpham]);
    }
    public function detail($id){
        $sanpham = san_pham::find($id);
        $loaisp = loai_sp::all();
        $spcungloai = san_pham::where('id_loai_sp', $sanpham->id_loai_sp)->get();
        return view('client.detail', ['sanpham'=>$sanpham, 'loaisanpham'=>$loaisp, 'spcungloai'=>$spcungloai]);
    }

    public function searchProduct(Request $request){
        $loaisp = loai_sp::all();
        $result = san_pham::where('name', 'like', '%'.$request->keyword.'%')
                            ->orWhere('unit_price', $request->keyword)
                            ->paginate(9);

        return view('client.shop', ['loaisanpham'=>$loaisp, 'sanphams'=>$result]);
    }
}
