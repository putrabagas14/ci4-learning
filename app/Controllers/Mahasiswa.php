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

            session()->setFlashdata('berhasil', 'Berhasil Menambah Data');
            return redirect()->to("mahasiswa");
        }
    }

    public function edit($id) {

        if ($id == null || $id == 0) {
            session()->setFlashdata("gagal", "Id tidak boleh kosong");
            return redirect('mahasiswa');
        }

        $mahasiswa = new MahasiswaModel();
        $data_mahasiswa = $mahasiswa->find($id);

        $data['data'] = $data_mahasiswa;
        $data['validation'] = \Config\Services::validation();

        return view('mahasiswa/update', $data);
    }

    public function update($id) {
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
            return redirect()->to('mahasiswa/edit/'.$id)->withInput();
        } else {
            $data = [
                "nama" => $this->request->getVar('nama'),
                "gambar" => $this->request->getVar('gambar'),
                "email" => $this->request->getVar('email'),
                "alamat" => $this->request->getVar('alamat'),
                "jurusan" => $this->request->getVar('jurusan'),
                "nis" => $this->request->getVar('nis')
            ];
            $updateData = new MahasiswaModel();
            $updateData->update($id, $data);

            session()->setFlashdata('berhasil', "Berhasil mengubah data");

            return redirect('mahasiswa');
        }
    }

    public function delete($id) {

        $result = new MahasiswaModel();
        if ($result->delete($id)) {
            session()->setFlashdata('berhasil', 'Berhasil menghapus data');
        } else {
            session()->setFlashdata('gagal', 'Gagal menghapus data');
        }

        return redirect('mahasiswa');
    }
}