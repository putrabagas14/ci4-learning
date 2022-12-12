<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\I18n\Time;

class Mahasiswa extends BaseController {
    public function index() {
        // $tesData = [
        //     [
        //         "nama" => "tes1",
        //         "kelas" => "XII RPL 2",
        //         "jurusan" => "Rekayasa Perankat Lunak"
        //     ],
        //     [
        //         "nama" => "tes2",
        //         "kelas" => "XII RPL 2",
        //         "jurusan" => "Rekayasa Perankat Lunak"
        //     ]
        // ];

        $mahasiswa = new MahasiswaModel();
        $dataMahasiswa = $mahasiswa->findAll();
        // $dataMahasiswa = $mahasiswa->paginate(2);

        return view('mahasiswa/index', ["data" => $dataMahasiswa]);
    }

    public function add() {
        session();

        $data = [
            "tes" => "tes",
            "validation" => \Config\Services::validation()
        ];

        return view('mahasiswa/add', $data);
    }

    public function save() {
        if (!$this->validate([
            "nama" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama harus diisi",
                ]
                ],
            "gambar" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Gambar harus diisi"
                    ]
                ],
            "email" => [
                    "rules" => "required|valid_email",
                    "errors" => [
                        "required" => "Email harus diisi",
                        "valid_email" => "Gunakan format email yang benar"
                    ]
                ],
                "alamat" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Alamat harus diisi",
                    ]
                ],
                "jurusan" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Jurusan harus diisi",
                    ]
                ],
                "nis" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Nis harus diisi",
                    ]
                ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('mahasiswa/add')->withInput();
        } else {
            // session()->setFlashdata('berhasil', 'berhasillllll');

            $mahasiswa = new MahasiswaModel();
            $mahasiswa->insert([
            "nama" => $this->request->getVar('nama'),
            "gambar" => $this->request->getVar('gambar'),
            "email" => $this->request->getVar('email'),
            "alamat" => $this->request->getVar('alamat'),
            "jurusan" => $this->request->getVar('jurusan'),
            "nis" => $this->request->getVar('nis'),
            "created_at" => Time::now()
            ]); 

            session()->setFlashdata('success_create', 'Berhasil Menambah Data');
            return redirect()->to("mahasiswa");
        }
    }
}