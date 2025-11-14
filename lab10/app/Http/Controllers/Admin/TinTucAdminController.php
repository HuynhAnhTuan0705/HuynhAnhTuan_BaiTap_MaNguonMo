<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TinTuc;
use App\Models\DanhMuc;

class TinTucAdminController extends Controller
{
    public function index() {
        $items = TinTuc::with('danhMuc')->orderByDesc('id')->paginate(10);
        return view('admin.tin.index', compact('items'));
    }
    public function create() {
        $danhMucs = DanhMuc::orderBy('ten')->get();
        return view('admin.tin.create', compact('danhMucs'));
    }
    public function edit($id) {
        $tin = TinTuc::findOrFail($id);
        $danhMucs = DanhMuc::orderBy('ten')->get();
        return view('admin.tin.edit', compact('tin','danhMucs'));
    }
}
