<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Encryption\Encryption as EncryptionEncryption;
use Config\Encryption;

class User extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $data_user = $user->findAll();

        $data['user'] = $data_user;

        return view('user/index', $data);
    }

    public function add()
    {
        session();

        $data = [
            "validation" => \Config\Services::validation()
        ];

        return view('user/add', $data);
    }

    public function save()
    {
        if(!$this->validate([
            "username" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Username harus diisi!"
                ]
            ],
            "email" => [
                "rules" => "required|valid_email",
                "errors" => [
                    "required" => "Email harus diisi!",
                    "valid_email" => "Gunakan format email yang benar"
                ]
            ],
            "password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Password harus diisi!"
                ]
            ],
            "konfirmasi_password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Konfirmasi Password harus diisi!"
                ]
            ],
            "level" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Level harus diisi!"
                ]
            ],
        ])) {
            return redirect()->to('user/add')->withInput();
        } else {
            $username = htmlspecialchars($this->request->getVar('username'));
            $email = htmlspecialchars($this->request->getVar('email'));
            $password = htmlspecialchars($this->request->getVar('password'));
            $konfirmasi_password = htmlspecialchars($this->request->getVar('konfirmasi_password'));
            $level = htmlspecialchars($this->request->getVar('level'));

            if ($password != $konfirmasi_password) {
                session()->setFlashdata('gagal', "Konfirmasi Password tidak sesuai");
                return redirect()->to('user/add')->withInput();
            } else {
                $user = new UserModel();
                $user->insert([
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "level" => $level
                ]);
                session()->setFlashdata("berhasil", "Berhasil menambah data user");
                return redirect()->to("user");
            }
        }
    }
}
