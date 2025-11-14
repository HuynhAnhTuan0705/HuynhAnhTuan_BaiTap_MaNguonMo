<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc; use App\Models\DanhMuc; use Illuminate\Http\Request;
class TinTucController extends Controller {
  public function index(){ $items=TinTuc::withTrashed()->with('danhMuc')->latest()->paginate(15); return view('admin.tin.index',compact('items')); }
  public function create(){ $danhMucs=DanhMuc::orderBy('ten')->get(); return view('admin.tin.create',compact('danhMucs')); }
  public function store(Request $r){
    $data=$r->validate([
      'tieude'=>'required|min:3|max:200','tomtat'=>'nullable|max:300','noidung'=>'required',
      'hinhanh'=>'nullable|max:100','ngaydang'=>'nullable|date','danh_muc_id'=>'nullable|exists:danh_mucs,id'
    ]);
    TinTuc::create($data); return redirect()->route('admin.tin.index')->with('ok','Đã tạo');
  }
  public function edit(TinTuc $tin){ $danhMucs=DanhMuc::orderBy('ten')->get(); return view('admin.tin.edit',compact('tin','danhMucs')); }
  public function update(Request $r, TinTuc $tin){
    $data=$r->validate([
      'tieude'=>'required|min:3|max:200','tomtat'=>'nullable|max:300','noidung'=>'required',
      'hinhanh'=>'nullable|max:100','ngaydang'=>'nullable|date','danh_muc_id'=>'nullable|exists:danh_mucs,id'
    ]);
    $tin->update($data); return back()->with('ok','Đã cập nhật');
  }
  public function destroy(TinTuc $tin){ $tin->delete(); return back()->with('ok','Đã đưa vào thùng rác'); }
  public function restore($id){ TinTuc::withTrashed()->findOrFail($id)->restore(); return back()->with('ok','Đã khôi phục'); }
  public function forceDelete($id){ TinTuc::withTrashed()->findOrFail($id)->forceDelete(); return back()->with('ok','Đã xóa vĩnh viễn'); }
}
