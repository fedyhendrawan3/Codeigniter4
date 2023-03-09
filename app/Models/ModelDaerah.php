<?php namespace App\Models;

use CodeIgniter\Model;

class ModelDaerah extends Model
{
    //table name
    protected $table = "daerah";

    //allowed fields
    protected $allowedFields = 
    [
        'nama_daerah',
        'status'
    ];

    public function getDaereah()
    {
        return $this->findAll();
    }
}

?>