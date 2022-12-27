<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $useTimeStamps = true;

    protected $allowedFields = [
        "username", "email", "password", "level"
    ];
}
