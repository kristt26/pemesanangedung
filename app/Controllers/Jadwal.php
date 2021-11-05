<?php

namespace App\Controllers;

// use App\Controllers\BaseController;
// use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Jadwal extends ResourceController
{
    protected $modelName = 'App\Models\PesananModel';
    protected $format = 'json';
    protected $menu;
    protected $paket;
    protected $detailPaket;
    protected $detailPesanan;

    public function __construct()
    {
        $this->fasilitas = new \App\Models\FasilitasModel();
        $this->detailPesanan = new \App\Models\DetailPesananModel();
    }

    public function index()
    {
        $data['title'] = ["title" => "Jadwal", "sub" => ""];
        $data['content'] = view("jadwal");
        $data['sidebar'] = view("layout/backend/sidebar", $data['title']);
        return view('layout/frontend/welcome', $data);
    }

    public function read()
    {
        $result = $this->model->get()->getResultArray();
        return $this->respond($result);
    }

    public function CheckTanggal($tanggal)
    {
        $dari = $tanggal['awal']; // tanggal mulai
        $sampai = $tanggal['akhir']; // tanggal akhir
        $data = [];
        while (strtotime($dari) <= strtotime($sampai)) {
            array_push($data, $dari);
            $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari))); //looping tambah 1 date
        }
        $b = $data;
        return $data;
    }

    public function tanggalsiaran($data)
    {
        //     try {
        //         $jadwal = new \App\Models\JadwalModel();
        //         $layanan = new \App\Models\LayananModel();
        //         $dataLayanan = $layanan->get()->getResultArray();
        //         $dari = $data['awal'];
        //         $sampai = $data['akhir'];
        //         $datawaktu = ['Pagi', 'Siang', 'Sore'];
        //         $siaran = $jadwal->query("SELECT
        //             `jadwalsiaran`.*,
        //             `layanan`.`layanan`,
        //             `layanan`.`id` AS `layananid`
        //         FROM
        //             `jadwalsiaran`
        //             LEFT JOIN `iklan` ON `iklan`.`id` = `jadwalsiaran`.`iklanid`
        //             LEFT JOIN `tarif` ON `tarif`.`id` = `iklan`.`tarifid`
        //             LEFT JOIN `layanan` ON `layanan`.`id` = `tarif`.`layananid` WHERE jadwalsiaran.tanggal >= '$dari' AND jadwalsiaran.tanggal <= '$sampai'")->getResultArray();
        //         $newArray = [];
        //         while (strtotime($dari) <= strtotime($sampai)) {
        //             foreach ($datawaktu as $key => $waktu) {
        //                 $new_array = [];
        //                 foreach ($dataLayanan as $key => $itemLayanan) {
        //                     foreach ($siaran as $key => $value) {
        //                         $time = strtotime($dari);
        //                         $tanggal = date('Y-m-d', $time);
        //                         if ($value['tanggal'] == $tanggal && $value['waktu'] == $waktu && $value['layananid'] == $itemLayanan['id']) {
        //                             array_push($new_array, $value);
        //                         }
        //                     }
        //                 }
        //                 if (count($new_array) < 5) {
        //                     $item = [
        //                         'tanggal' => $dari,
        //                         'waktu' => $waktu,
        //                     ];
        //                     array_push($newArray, $item);
        //                 }
        //             }

        //             $dari = date("Y-m-d", strtotime("+1 day", strtotime($dari)));
        //         }
        //         return $newArray;
        //     } catch (\Throwable $th) {
        //         return $this->respond(['message' => $th->getMessage()]);
        //     }
    }
}