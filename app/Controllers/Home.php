<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = ['title' => 'Home'];
        $data['sidebar'] = view('layout/backend/sidebar');
        $data['content'] = view('home');
        return view('layout/backend/welcome', $data);
    }
    public function read()
    {
        
    }
    
}