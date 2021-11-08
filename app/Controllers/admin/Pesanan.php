<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class Pesanan extends ResourceController
{
    protected $modelName = 'App\Models\PesananModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->pembayaran = new \App\Models\PembayaranModel();
        $this->detailPesanan = new \App\Models\DetailPesananModel();
    }

    public function index()
    {
        $data['title'] = ["title" => "Pesanan", "sub" => ""];
        $data['content'] = view("pesanan");
        $data['sidebar'] = view("layout/backend/sidebar", $data['title']);
        return view('layout/backend/welcome', $data);
    }

    public function read()
    {
        $fasilitas = new \App\Models\FasilitasModel();
        $data['pesanan'] = $this->model->select();
        foreach ($data['pesanan'] as $key => $value) {
            $value->detail = $this->detailPesanan->where('pesanan_id', $value->id)->findAll();
            $value->pembayaran = $this->pembayaran->where('pesanan_id', $value->id)->findAll();
        }
        $data['fasilitas'] = $fasilitas->findAll();
        return $this->respond($data);
    }

    public function put($id = null)
    {
        $data = $this->request->getJSON();
        $item = [
            "status_bayar" => $data->status_bayar,
        ];
        $this->model->update($id, $item);
        return $this->respondUpdated($data, "diubah");
    }
}