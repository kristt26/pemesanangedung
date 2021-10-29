<?php

namespace App\Controllers;

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

    public function read()
    {

    }

    public function post()
    {

    }

    public function put()
    {

    }

    public function delete($id = null)
    {
        try {
            return $this->respond($this->model->delete($id));
        } catch (\Throwable$th) {
            return $this->fail($th->getMessage());
        }
    }
}