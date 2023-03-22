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

    public function getKategoriById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_kategori' => $id]);
        }   
    }
	
	public function updateKategori($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_kategori' => $id));
        return $query;
    }
	
	public function deleteKategori($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_kategori' => $id));
        return $query;
    }

    public function insertKategori($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>