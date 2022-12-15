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

        $current_page = $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1 ;

        $mahasiswa = new MahasiswaModel();
        // parameter 'mahasiswa' adalah nama table

        $keyword = $this->request->getVar('keyword');
        if ($keyword != "" || $keyword != null) {
            $mahasiswa->like('nama', $keyword);
        }
        $data_mahasiswa = $mahasiswa->paginate(2, 'mahasiswa');

        return view('mahasiswa/index', ["data" => $data_mahasiswa, "pager" => $mahasiswa->pager, 'current_page' => $current_page]);
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
                    "rules" => "uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]",
                    "errors" => [
                        "uploaded" => "Gambar harus diisi",
                        "mime_in" => "Ekstensi file harus jpg, jpeg, gif, png",
                        "max_size" => "Ukuran file maksimal 2 mb"
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

            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();
            // $nama_gambar = $file_gambar->getRandomName();

            $mahasiswa = new MahasiswaModel();
            $mahasiswa->insert([
            "nama" => $this->request->getVar('nama'),
            "gambar" => $nama_gambar,
            "email" => $this->request->getVar('email'),
            "alamat" => $this->request->getVar('alamat'),
            "jurusan" => $this->request->getVar('jurusan'),
            "nis" => $this->request->getVar('nis'),
            "created_at" => Time::now()
            ]);

            $file_gambar->move("gambar/", $nama_gambar);
            // move() defaultnya didalam folder public

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
                    "rules" => "uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2048]",
                    "errors" => [
                        "uploaded" => "Gambar harus diisi",
                        "mime_in" => "Ekstensi file harus jpg, jpeg, gif, png",
                        "max_size" => "Ukuran file maksimal 2 mb"
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
            $file_gambar = $this->request->getFile('gambar');
            $nama_gambar = $file_gambar->getName();

            $mahasiswa = new MahasiswaModel();
            $data_lama = $mahasiswa->find($id);

            $data = [
                "nama" => $this->request->getVar('nama'),
                "gambar" => $nama_gambar,
                "email" => $this->request->getVar('email'),
                "alamat" => $this->request->getVar('alamat'),
                "jurusan" => $this->request->getVar('jurusan'),
                "nis" => $this->request->getVar('nis')
            ];

            $mahasiswa->update($id, $data);

            if ($file_gambar->move("gambar/", $nama_gambar)) {
                if (file_exists(FCPATH."gambar/".$data_lama["gambar"])) {
                    unlink(FCPATH."gambar/".$data_lama['gambar']);
                }
            }

            session()->setFlashdata('berhasil', "Berhasil mengubah data");

            return redirect('mahasiswa');
        }
    }

    public function delete($id) {

        $result = new MahasiswaModel();
        $gambar = $result->find($id);
        // dd(FCPATH."gambar/".$gambar['gambar']);
        if ($result->delete($id)) {
            if (file_exists(FCPATH."gambar/".$gambar['gambar'])) {
                unlink(FCPATH."gambar/".$gambar['gambar']);
                // FCPATH berisi path yang defaultnya didalam folder public
            }
            session()->setFlashdata('berhasil', 'Berhasil menghapus data');
        } else {
            session()->setFlashdata('gagal', 'Gagal menghapus data');
        }

        return redirect('mahasiswa');
    }
}