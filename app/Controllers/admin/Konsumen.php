<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Konsumen extends BaseController
{
    protected $modelName = "App\Models\KonsumenModel";
    protected $format = "json";
    protected $userinrole;
    protected $user;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->userinrole = new \App\Models\UserInRoleModel();
        $this->user = new \App\Models\UserModel();
        $this->encrypter = \Config\Services::encrypter();
    }
    public function index()
    {
        $data['title'] = ['title' => 'Konsumen'];
        $data['sidebar'] = view('layout/backend/sidebar');
        $data['content'] = view('konsumen');
        return view('layout/backend/welcome', $data);
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
        $data = $this->request->getJSON();
        try {
            $this->db->transBegin();
            $data->password = base64_encode($this->encrypter->encrypt($data->password));
            $this->user->insert($data);
            $data->users_id = $this->user->getInsertID();
            $roles=[
                'users_id'=>$data->users_id,
                'roles_id'=>'3'
            ];
            $this->userinrole->insert($roles);
            $this->model->insert($data);
            $data->id = $this->model->getInsertID();
            if($this->db->transStatus()==false){
                $this->db->transRollback();
            }else{
                $this->db->transCommit();
                return $this->respond($data);
            }

        } catch (\Throwable $th) {
            $this->db->transRollback();

            return $this->fail($th->getMessage());
        }
    }
    
    public function put($id = null)
    {
        $data = $this->request->getJSON();
        try {
            $this->model->update($id, $data);
            return $this->respond($data);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }

    }
    
    public function delete($id = null)
    {
        return $this->respond($this->model->delete($id));
    }
}