<?php namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    //table name
    protected $table = "kategori";

    //allowed fields
    protected $allowedFields = 
    [
        'nama_kategori',
        'status'
    ];

    public function getkategori()
    {
        return $this->findAll();
    }
}

?>