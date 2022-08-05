<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id_user";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["nama", "telp", "email", "username", "password", "role"];
    protected $useTimestamps = false;

    public function getUser($id)
    {
        return $this->where(['id_user' => $id])->first();
    }
}
