<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

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

        if $this->

        return view('mahasiswa/index', ["data" => $dataMahasiswa]);
    }

    public function add() {
        return view('mahasiswa/add');
    }

    public function save() {
        dd($this->request->getVar());
    }
}