<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $useTimeStamps = true;

    protected $allowedFields = [
        "nama", "gambar", "email", "alamat", "jurusan", "nis", "created_at", "updated_at"
    ];
}