<?php
    namespace App\Controllers;
    use App\Models\ModelKategori;

    class Kategori extends BaseController
    {
        public function index()
        {
            $Kategoris = new ModelKategori();
            $pager = \Config\Services::pager();

            $data = array (
                'kategoris' => $Kategoris->paginate(10, 'kategori'),
                'pager' => $Kategoris->pager
            );

            return view('Kategori', $data);
        }

        public function update($id)
        {
            $model = new ModelKategori(); 
            $data['kategori'] = $model->getKategoriById($id)->getRow();
            echo view('KategoriEdit', $data);
        }

        public function edit()
        {
            $model = new ModelKategori(); 
            $id = $this->request->getPost('id_kategori');
            $data = array (
                'nama_kategori'  => $this->request->getPost('nama_kategori'),
                'status' => $this->request->getPost('status'),
            );
            $model->updateKategori($data, $id);
            return redirect()->to('/Kategori');
        }

        public function delete($id)
        {
            $model = new ModelKategori();
            $model->deleteKategori($id);
            return redirect()->to('/Kategori');
        }

        public function input()
        {
            echo view('KategoriInput');
        }

        public function insert()
        {
            $model = new ModelKategori();
            $data = array (
                'nama_kategori'  => $this->request->getPost('nama_kategori'),
                'status' => $this->request->getPost('status'),
            );
            $model->insertKategori($data);
            return redirect()->to('/Kategori');   
        }
    }
    

?>