<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect('default');
    }

    public function laporan()
    {

    }
}