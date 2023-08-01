<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loai_sp;

class CategoryController extends Controller
{
    public function loaisp_index(){
        $db = loai_sp::orderby('id','desc')->get();
        return view('admin.loaisp.index', ['loaisp'=>$db]);
    }

    public function loaisp_delete($id){
        loai_sp::find($id)->delete();
        return redirect()->route('admin.loaisp.index');
    }
    
    public function loaisp_show($id){
        $db = loai_sp::find($id);
        return view('admin.loaisp.edit', ['loaisp'=>$db]);
    }
    public function loaisp_update($id, Request $res){
        loai_sp::find($id)->update(['id'=>$id, 'tenloai'=>$res->tenloai]);
        return redirect()->route('admin.loaisp.index');
    }
    public function loaisp_new(){
        $db = new loai_sp();
        return view('admin.loaisp.add',['loaisp'=>$db]);
    }
    public function loaisp_store(Request $res){
        loai_sp::create(['tenloai'=>$res->tenloai]);
        return redirect()->route('admin.loaisp.index');
    }
}

