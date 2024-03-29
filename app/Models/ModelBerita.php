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


    public function getBeritaById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id' => $id]);
        }   
    }
	
	public function updateBerita($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
	
	public function deleteBerita($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }

    public function insertBerita($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>