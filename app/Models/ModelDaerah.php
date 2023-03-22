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

    public function getDaerahById($id_daerah = false)
    {
        if($id_daerah === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_daerah' => $id_daerah]);
        }   
    }

    public function updateDaerah($data, $id_daerah)
    {
        $query = $this->db->table($this->table)->update($data, array('id_daerah' => $id_daerah));
        return $query;
    }
	
	public function deleteDaerah($id_daerah)
    {
        $query = $this->db->table($this->table)->delete(array('id_daerah' => $id_daerah));
        return $query;
    }

    public function insertDaerah($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
}

?>