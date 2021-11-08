<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $fasilitas = new \App\Models\FasilitasModel();
        $item['fasilitas'] = $fasilitas->findAll();
        $data['title'] = ['title' => 'Home'];
        $data['sidebar'] = view('layout/backend/sidebar');
        $data['content'] = view('home', $item);
        return view('layout/backend/welcome', $data);

    }
    public function read()
    {

    }

}