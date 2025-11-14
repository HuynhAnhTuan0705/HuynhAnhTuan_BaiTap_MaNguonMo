<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TinTuc; use App\Models\DanhMuc;
class PublicController extends Controller {
  public function index(Request $r){
    $q=$r->q; $dm=$r->dm;
    $items = TinTuc::query()
      ->when($dm,fn($qq)=>$qq->whereHas('danhMuc',fn($q2)=>$q2->where('slug',$dm)))
      ->when($q, fn($qq)=>$qq->where('tieude','LIKE','%'.$q.'%'))
      ->orderByDesc('ngaydang')->paginate(9)->withQueryString();
    $danhMucs = DanhMuc::orderBy('ten')->get();
    return view('site.index', compact('items','danhMucs','q','dm'));
  }
  public function show($id){ $tin=TinTuc::findOrFail($id); return view('site.show',compact('tin')); }
}

