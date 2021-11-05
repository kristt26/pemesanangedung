<?php

namespace App\Controllers\Admin;

use App\Libraries\Decode;
use CodeIgniter\RESTful\ResourceController;

class Fasilitas extends ResourceController
{
    protected $modelName = "App\Models\FasilitasModel";
    protected $format = "json";

    public function index()
    {
        $data['title'] = ['title' => "Fasilitas"];
        $data['sidebar'] = view("layout/backend/sidebar");
        $data['content'] = view("fasilitas");
        return view("layout/backend/welcome", $data);
    }

    public function read($id = null)
    {
        if (is_null($id)) {
            return $this->respond($this->model->findAll());
        } else {
            return $this->respond($this->model->findAll($id));
        }
    }

    public function post()
    {
        $decode = new Decode();
        $data = $this->request->getJSON();
        $data->gambar = isset($data->gambar->base64) ? $decode->decodebase64($data->gambar->base64, 'foto') : $data->gambar;
        $this->model->insert($data);
        $data->id = $this->model->getInsertID();
        return $this->respond($data);
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
}