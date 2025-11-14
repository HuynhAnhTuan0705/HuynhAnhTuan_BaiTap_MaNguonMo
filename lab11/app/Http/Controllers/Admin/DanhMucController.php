<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class DanhMucController extends Controller {
  public function index(){ $items=DanhMuc::latest()->paginate(15); return view('admin.dm.index',compact('items')); }
  public function create(){ return view('admin.dm.create'); }
  public function store(Request $r){
    $data=$r->validate(['ten'=>'required|min:2|max:120']);
    $data['slug']=Str::slug($data['ten']);
    DanhMuc::create($data); return back()->with('ok','Đã tạo');
  }
  public function edit(DanhMuc $danhmuc){ return view('admin.dm.edit',compact('danhmuc')); }
  public function update(Request $r, DanhMuc $danhmuc){
    $data=$r->validate(['ten'=>'required|min:2|max:120']);
    $data['slug']=Str::slug($data['ten']);
    $danhmuc->update($data); return back()->with('ok','Đã cập nhật');
  }
  public function destroy(DanhMuc $danhmuc){ $danhmuc->delete(); return back()->with('ok','Đã xóa'); }
}
