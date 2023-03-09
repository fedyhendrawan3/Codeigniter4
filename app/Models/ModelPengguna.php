<?php namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    //table name
    protected $table = "pengguna";

    //allowed fields
    protected $allowedFields = 
    [
        'email',
        'nama',
        'verifikasi'
    ];

    public function getPengguna()
    {
        return $this->findAll();
    }
}

?>