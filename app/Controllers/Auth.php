<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;
use \Firebase\JWT\JWT;

class Auth extends ResourceController
{
    protected $modelName = "App\Models\UserModel";
    protected $format = "json";

    public function index()
    {
        $this->model->check();
        return view("login");
    }

    public function registration()
    {
        $this->model->check();
        return view("registrasi");
    }

    public function register()
    {
        $data = $this->request->getPost();
        if ($this->model->simpan($data)) {
            $response = [
                'status' => 200,
                "error" => false,
                'messages' => 'Successfully, user has been registered',
                'data' => [],
            ];
        } else {

            $response = [
                'status' => 500,
                "error" => true,
                'messages' => 'Failed to create user',
                'data' => [],
            ];
        }

        // return $this->respondCreated($response);
        return redirect()->to(base_url());
    }

    public function login()
    {

        $session = session();
        $data = (array) $this->request->getPost();
        $result = $this->model->login($data);
        if ($result) {
            $result['logged_in'] = true;
            $session->set($result);
            if ($result['role'] == 'Admin') {
                return redirect()->to(base_url('home'));
            } else {
                return redirect()->to(base_url('home'));
            }

        } else {
            return redirect()->back();
        }
    }

    public function details()
    {
        $key = keyJWT;
        $authHeader = $this->request->getHeader("Authorization");
        $authHeader = $authHeader->getValue();
        $token = $authHeader;

        try {
            $decoded = JWT::decode($token, $key, array("HS256"));

            if ($decoded) {

                $response = [
                    'status' => 200,
                    'error' => false,
                    'messages' => 'User details',
                    'data' => [
                        'profile' => $decoded,
                    ],
                ];
                return $this->respondCreated($response);
            }
        } catch (Exception $ex) {

            $response = [
                'status' => 401,
                'error' => true,
                'messages' => 'Access denied',
                'data' => [],
            ];
            return $this->respondCreated($response);
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}