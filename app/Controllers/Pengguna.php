<?php
    namespace App\Controllers;
    use App\Models\ModelPengguna;

    class Pengguna extends BaseController
    {
        public function index()
        {
            $Penggunas = new ModelPengguna();
            $pager = \Config\Services::pager();

            $data = array (
                'penggunas' => $Penggunas->paginate(2, 'pengguna'),
                'pager' => $Penggunas->pager
            );

            return view('Pengguna', $data);
        }

        public function update($id)
        {
            $model = new ModelPengguna(); 
            $data['pengguna'] = $model->getPenggunaById($id)->getRow();
            echo view('PenggunaEdit', $data);
        }

        public function edit()
        {
            $model = new ModelPengguna();
            $id = $this->request->getPost('id');
            $data = array (
                'email'  => $this->request->getPost('email'),
                'nama' => $this->request->getPost('nama'),
                'verifikasi' => $this->request->getPost('verifikasi'),
            );
            $model->updatePengguna($data, $id);
            return redirect()->to('/Pengguna');
        }

        public function delete($id)
        {
            $model = new ModelPengguna();
            $model->deletePengguna($id);
            return redirect()->to('/Pengguna');
        }

        public function input()
        {
            echo view('PenggunaInput');
        }

        public function insert()
        {
            $model = new ModelPengguna();
            //$id = $this->request->getPost('id');
            $data = array (
                'email'  => $this->request->getPost('email'),
                'nama' => $this->request->getPost('nama'),
                'verifikasi' => $this->request->getPost('verifikasi'),
            );
            $model->insertPengguna($data);
            return redirect()->to('/Pengguna');   
        }
    }
    

?>