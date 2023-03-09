<?php namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    //table name
    protected $table = "berita";

    //allowed fields
    protected $allowedFields = 
    [
        'judul',
        'tanggal',
        'isi'
    ];

    public function getBerita()
    {
        return $this->findAll();
    }
}

?>