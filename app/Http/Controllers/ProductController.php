<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\loai_sp;
use App\Models\nha_cung_cap;

class ProductController extends Controller
{
    public function sp_index(){
        $db = san_pham::orderby('id','desc')->get();
        return view('admin.sanpham.index', ['sp'=>$db]);
    }

    public function sp_delete($id){
        san_pham::find($id)->delete();
        return redirect()->route('admin.sp.index');
    }
    
    public function sp_show($id){
        $db = san_pham::find($id);
        $category = loai_sp::all();
        $nhacungcap = nha_cung_cap::all();
        return view('admin.sanpham.edit',['sp'=>$db, 'category'=>$category, 'nhacungcap'=>$nhacungcap]);
    }
    public function sp_update($id, Request $res){
        $sp = san_pham::find($id);
        $sp->name = $res->name;
        $sp->id_loai_sp = $res->loaisp;
        $sp->id_ncc = $res->ncc;
        $sp->mota_sp = $res->mota_sp;
        $sp->unit_price = $res->unit_price;
        $sp->so_luong = $res->so_luong;
        $get_image = $res->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('assets/img', $new_image);
            
            $sp->image = $new_image;
            $sp->save();

            return redirect()->route('admin.sp.index');
        }
        $sp->save();

        return redirect()->route('admin.sp.index');
    }
    public function sp_new(){
        $db = new san_pham();
        $category = loai_sp::all();
        $nhacungcap = nha_cung_cap::all();
        return view('admin.sanpham.add',['sp'=>$db, 'category'=>$category, 'nhacungcap'=>$nhacungcap]);
    }
    public function sp_store(Request $res){
        $sp = new san_pham;
        $sp->name = $res->name;
        $sp->id_loai_sp = $res->loaisp;
        $sp->id_ncc = $res->ncc;
        $sp->mota_sp = $res->mota_sp;
        $sp->unit_price = $res->unit_price;
        $sp->so_luong = $res->so_luong;
        $get_image = $res->file('image');
       
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'.'.$get_image->getClientOriginalExtension();
            $get_image->move('assets/img', $new_image);
            
            $sp->image = $new_image;
            $sp->save();

            return redirect()->route('admin.sp.index');
        }
        $sp->image = '';
        $sp->save();

        return redirect()->route('admin.sp.index');
    }
}

