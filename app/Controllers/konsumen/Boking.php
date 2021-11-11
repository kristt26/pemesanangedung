<?php

namespace App\Controllers\Konsumen;

use CodeIgniter\RESTful\ResourceController;

class Boking extends ResourceController
{
    protected $modelName = "App\Models\PesananModel";
    protected $format = "json";

    public function __construct()
    {
        $this->detailPesanan = new \App\Models\DetailPesananModel();
        $this->pembayaran = new \App\Models\PembayaranModel();

    }

    public function index()
    {
        $data['title'] = ['title' => "Boking"];
        $data['sidebar'] = view("layout/backend/sidebar");
        $data['content'] = view("boking");
        return view("layout/backend/welcome", $data);
    }

    public function read()
    {
        $fasilitas = new \App\Models\FasilitasModel();
        $data['pesanan'] = $this->model->where('konsumen_id', session()->get('id'))->get()->getResultObject();
        foreach ($data['pesanan'] as $key => $pesan) {
            $pesan->detail = $this->detailPesanan->where('pesanan_id', $pesan->id)->get()->getResultObject();
            $pesan->pembayaran = $this->pembayaran->where('pesanan_id', $pesan->id)->get()->getResultObject();
            $pesan->totalBayar = $this->pembayaran->where('pesanan_id', $pesan->id)->selectSum('nominal')->get()->getRowObject()->nominal;
        }
        $data['fasilitas'] = $fasilitas->findAll();
        return $this->respond($data);
    }

    public function post()
    {
        $data = $this->request->getJSON();
        $data->tanggal_pesan = date("Y-m-d");
        $data->konsumen_id = session()->get('id');
        $data->status_bayar = "0";
        $this->model->insert($data);
        $data->id = $this->model->getInsertID();
        foreach ($data->detail as $key => $value) {
            $detail = [
                'pesanan_id' => $data->id,
                'fasilitas_id' => $value->fasilitas_id,
                'jumlah' => $value->jumlah,
                'nominal' => $value->tarif,
            ];
            $value->pesanan_id = $data->id;
            $this->detailPesanan->insert($detail);
            $value->id = $this->detailPesanan->getInsertID();
        }
        return $this->respondCreated($data, "disimpan");

    }

    public function put($id = null)
    {
        $data = $this->request->getJSON();
        try {
            $this->model->update($id, $data);
            return $this->respond($data);
        } catch (\Throwable$th) {
            return $this->fail($th->getMessage());
        }

    }

    public function delete($id = null)
    {
        return $this->respond($this->model->delete($id));
    }

    public function pembayaran()
    {
        $decode = new \App\Libraries\Decode();
        $data = $this->request->getJSON();
        if (isset($data->bukti)) {
            try {
                $data->bukti = $decode->decodebase64($data->bukti->base64, 'pembayaran');
                $set = [
                    'nominal' => $data->nominal,
                    'bukti' => $data->bukti,
                    'pesanan_id' => $data->id,
                ];
                $this->pembayaran->insert($set);
                $data->pembayaran = $this->pembayaran->where('pesanan_id', $data->id)->findAll();
                return $this->respondCreated($data, "disimpan");
            } catch (\Throwable$th) {
                $pesan = $th->getMessage();
                return $this->fail($pesan);
            }
        }

    }
}