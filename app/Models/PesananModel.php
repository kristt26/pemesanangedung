<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'pesanans';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'konsumen_id', 'peruntukan', 'tanggal_pesan', 'tanggal_pakai', 'status_bayar', 'orderid', 'tagihan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
    protected $db;

    public function __construct()
    {
        $this->db = db_connect('default');
    }

    public function select($awal = null, $akhir = null)
    {
        $data = $this->db->query("SELECT
            `pesanans`.*,
            `konsumens`.`nik`,
            `konsumens`.`nama`,
            `konsumens`.`kontak`,
            `konsumens`.`alamat`
        FROM
            `pesanans`
            LEFT JOIN `konsumens` ON `pesanans`.`konsumen_id` = `konsumens`.`id`")->getResult();
        return $data;
    }
    public function laporan($awal = null, $akhir = null)
    {
        $data = $this->db->query("SELECT
            `pesanans`.*,
            `konsumens`.`nik`,
            `konsumens`.`nama`,
            `konsumens`.`kontak`,
            `konsumens`.`alamat`
        FROM
            `pesanans`
            LEFT JOIN `konsumens` ON `pesanans`.`konsumen_id` = `konsumens`.`id` WHERE tanggal_pesan >= '$awal' AND tanggal_pesan <= '$akhir'")->getResult();
        return $data;
    }
}