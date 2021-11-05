<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id', 'username', 'password', 'email'];

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

    protected $encrypter;
    protected $db;

    public function __construct()
    {
        $this->encrypter = \Config\Services::encrypter();
        $this->db = db_connect('default');

    }

    public function check()
    {
        if ($this->db->table('users')->countAllResults(false) == 0) {
            $this->db->transBegin();
            $user = [
                "username" => "Administrator",
                "password" => base64_encode($this->encrypter->encrypt("Admin")),
            ];
            $this->db->table('users')->insert($user);
            $userid = $this->db->insertID();
            $role = [
                "role" => "Admin",
            ];
            $this->db->table('roles')->insert($role);
            $roleid = $this->db->insertID();
            $roleuser = [
                'users_id' => $userid,
                'roles_id' => $roleid,
            ];
            $this->db->table('userinrole')->insert($roleuser);
            $role = [
                "role" => "Konsumen",
            ];
            $this->db->table('roles')->insert($role);
            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return true;
            } else {
                $this->db->transCommit();
                return false;
            }
        }
    }

    public function login($data)
    {
        $username = $data['username'];
        $result = $this->db->query("SELECT
            `users`.`id`,
            `users`.`username`,
            `users`.`password`,
            `roles`.`role`
        FROM
            `users`
            LEFT JOIN `userinrole` ON `userinrole`.`users_id` = `users`.`id`
            LEFT JOIN `roles` ON `roles`.`id` = `userinrole`.`roles_id` WHERE username='$username'")->getRowArray();
        if ($result) {
            $p = $this->encrypter->decrypt(base64_decode($result['password']));
            if ($p == $data['password']) {
                if ($result['role'] == 'Konsumen') {
                    $item = $this->db->query("SELECT
                          `users`.`username`,
                            `users`.`password`,
                            `roles`.`role`,
                            `konsumens`.`nik`,
                            `konsumens`.`nama`,
                            `konsumens`.`alamat`,
                            `konsumens`.`kontak`,
                            `konsumens`.`users_id`,
                            `konsumens`.`id`
                    FROM
                        `users`
                        LEFT JOIN `userinrole` ON `userinrole`.`users_id` = `users`.`id`
                        LEFT JOIN `roles` ON `roles`.`id` = `userinrole`.`roles_id`
                        LEFT JOIN `konsumens` ON `users`.`id` = `konsumens`.`users_id` WHERE username='$username'")->getRowArray();
                    return $item;
                } else {
                    $result['nama'] = "Administrator";
                    return $result;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function simpan($data)
    {
        $builder = $this->db->table('users');
        $konsumen = new \App\Models\KonsumenModel();
        $userRole = new \App\Models\UserInRoleModel();
        $roles = new \App\Models\RoleModel();
        $role = $roles->where('role', 'Konsumen')->first();

        $this->db->transStart();
        $user = [
            'username' => $data['username'],
            'password' => base64_encode($this->encrypter->encrypt($data['password'])),
            'email' => $data['email'],
        ];
        $builder->insert($user);
        $data['users_id'] = $this->db->insertID();
        $konsumen->insert($data);
        $itemRole = [
            "roles_id" => $role['id'],
            "users_id" => $data['users_id'],
        ];
        $userRole->insert($itemRole);
        if ($this->db->transStatus()) {
            $this->db->transCommit();
            return true;
        } else {
            $this->db->transRollBack();
            return false;
        }
    }
}