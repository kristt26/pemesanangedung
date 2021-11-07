<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class Laporan extends ResourceController
{
    protected $pesanan;
    protected $pembayaran;
    protected $detailPesanan;
    protected $konsumen;
    public function __construct()
    {
        $this->pesanan = new \App\Models\PesananModel();
        $this->pembayaran = new \App\Models\PembayaranModel();
        $this->detailPesanan = new \App\Models\DetailPesananModel();
        $this->konsumen = new \App\Models\KonsumenModel();
    }
    public function index()
    {
        $data['title'] = ['title' => 'Laporan'];
        $data['sidebar'] = view('layout/backend/sidebar');
        $data['content'] = view('laporan');
        return view('layout/backend/welcome', $data);
    }

    public function read()
    {
        $pesanans = $this->pesanan->select();
        foreach ($pesanans as $key => $pesanan) {
            $pesanan->pembayaran = $this->pembayaran->where('pesanan_id', $pesanan->id)->get()->getResultObject();
            $pesanan->total_bayar = $this->pembayaran->where('pesanan_id', $pesanan->id)->selectSum('nominal')->get()->getRow();
            $pesanan->detail = $this->detailPesanan->where('pesanan_id', $pesanan->id)->findAll();

        }
        return $this->respond($pesanans);
    }
}