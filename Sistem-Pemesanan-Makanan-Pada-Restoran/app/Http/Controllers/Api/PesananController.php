<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class Pesanantroller extends Controller
{

    public function index(Request $request)
    {
        $query = Pesanan::with('menu');

        if ($request->filled('cari')) {
            $cari = $request->input('cari');

            $query->where(function ($q) use ($cari) {
                $q->where('Nama_menu', 'like', "%{$cari}%")
                    ->orWhere('nama_pelanggan', 'like', "%{$cari}%");
            });
        }

        if ($request->filled('menu')) {
            $query->where(
                'menu_id',
                $request->input('menu')
            );
        }

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->input('status')
            );
        }

        $pesanan = $query
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();
        return response()->json($pesanan, 200);
    }


    