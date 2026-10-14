<?php

namespace App\Http\Controllers;

use App\Models\Pesana;

class PesananController extends Controller
{
    public function index()
    {
        $pesana = Pesanan::query()
            ->join('menus', 'menus.pesanans_id', '=', 'pesanans.id')
            ->select(
                'menus.id',
                'bukus.judul',
                'bukus.penulis',
                'bukus.tahun_terbit',
                'kategoris.nama as kategori'
            )
            ->get()
            ->map(function ($data) {
                return [
                    'id' => $data->id,
                    'judul' => $data->judul,
                    'penulis' => $data->penulis,
                    'tahun' => $data->tahun_terbit,
                    'kategori' => $data->kategori,
                ];
            });

        return view('buku.index', [
            'buku' => $buku
        ]);
    }

    public function detail(int $id)
    {
        $data = Buku::query()
            ->join('kategoris', 'bukus.kategori_id', '=', 'kategoris.id')
            ->where('bukus.id', $id)
            ->select(
                'bukus.id',
                'bukus.judul',
                'bukus.penulis',
                'bukus.tahun_terbit',
                'kategoris.nama as kategori'
            )
            ->first();

        $buku = null;

        return view('buku.detail', [
            'buku' => $buku
        ]);
    }
}

