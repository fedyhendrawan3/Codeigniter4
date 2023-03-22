<?php
    namespace App\Controllers;
    use App\Models\ModelBerita;

    class Berita extends BaseController
    {
        public function index()
        {
            $Beritas = new ModelBerita();
            $pager = \Config\Services::pager();

            $data = array (
                'beritas' => $Beritas->paginate(10, 'berita'),
                'pager' => $Beritas->pager
            );

            return view('Berita', $data);
        }

        public function update($id)
        {
            $model = new ModelBerita();   
            $data['berita'] = $model->getBeritaById($id)->getRow();
            echo view('BeritaEdit', $data);
        }

        public function edit()
        {
            $model = new ModelBerita();
            $id = $this->request->getPost('id');
            $data = array (
                'judul'  => $this->request->getPost('judul'),
                'tanggal' => $this->request->getPost('tanggal'),
                'isi' => $this->request->getPost('isi'),
            );
            $model->updateBerita($data, $id);
            return redirect()->to('/Berita');

        }

        public function delete($id)
        {
            $model = new ModelBerita();
            $model->deleteBerita($id);
            return redirect()->to('/Berita');
        }

        public function input()
        {
            echo view('BeritaInput');
        }

        public function insert()
        {
            $model = new ModelBerita();
            //$id = $this->request->getPost('id');
            $data = array (
                'judul'  => $this->request->getPost('judul'),
                'tanggal' => $this->request->getPost('tanggal'),
                'isi' => $this->request->getPost('isi'),
            );
            $model->insertBerita($data);
            return redirect()->to('/Berita');   
        }

    }
    

?>