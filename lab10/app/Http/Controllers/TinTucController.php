<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function index(Request $request)
    {
        $q  = $request->query('q');      // từ khóa tiêu đề
        $dm = $request->query('dm');     // slug danh mục

        $dsTin = TinTuc::query()
            ->when($dm, function ($qq) use ($dm) {
                $qq->whereHas('danhMuc', fn($q2) => $q2->where('slug', $dm));
            })
            ->when($q, fn($qq) => $qq->where('tieude', 'LIKE', '%'.$q.'%'))
            ->with('danhMuc')
            ->orderByDesc('ngaydang')->orderByDesc('id')
            ->paginate(9)
            ->withQueryString();

        // Dùng cho navbar/filter
        $danhMucs = DanhMuc::orderBy('ten')->get();

        return view('tintuc.index', compact('dsTin', 'danhMucs', 'q', 'dm'));
    }

    public function show($id)
    {
        $tin = TinTuc::with('danhMuc')->findOrFail($id);
        return view('tintuc.chitiet', compact('tin'));
    }
}
