<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{
    protected $table = "absen";
    protected $primaryKey = "id_absen";
    protected $useAutoIncrement = true;
    protected $allowedFields = ["tgl1", "tgl2", "tgl3", "tgl4", "tgl5", "tgl6", "tgl7", "tgl8", "tgl9", "tgl10", "id_user"];
    protected $useTimestamps = false;

    public function getAbsen($id)
    {
        return $this->where(['id_user' => $id])->first();
    }
}
