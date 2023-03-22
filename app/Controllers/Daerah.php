<?php
    namespace App\Controllers;
    use App\Models\ModelDaerah;

    class Daerah extends BaseController
    {
        public function index()
        {
            $Daerahs = new ModelDaerah();
            $pager = \Config\Services::pager();

            $data = array (
                'daerahs' => $Daerahs->paginate(10, 'daerah'),
                'pager' => $Daerahs->pager
            );

            return view('Daerah', $data);
        }

        public function update($id_daerah)
        {

            $model = new ModelDaerah();   
            $data['daerah'] = $model->getDaerahById($id_daerah)->getRow();
            echo view('DaerahEdit', $data);
            
        }

        public function edit()
        {
            $model = new ModelDaerah();
            $id_daerah = $this->request->getPost('id_daerah');
            $data = array (
                'nama_daerah'  => $this->request->getPost('nama_daerah'),
                'status' => $this->request->getPost('status'),
            );
            $model->updateDaerah($data, $id_daerah);
            return redirect()->to('/Daerah');  
        }

        public function delete($id)
        {
            $model = new ModelDaerah();
            $model->deleteDaerah($id);
            return redirect()->to('/Daerah');
        }

        public function input()
        {
            echo view('DaerahInput');
        }

        public function insert()
        {
            $model = new ModelDaerah();
            //$id = $this->request->getPost('id');
            $data = array (
                'nama_daerah'  => $this->request->getPost('nama_daerah'),
                'status' => $this->request->getPost('status'),
            );
            $model->insertDaerah($data);
            return redirect()->to('/Daerah');   
        }
    }
    

?>