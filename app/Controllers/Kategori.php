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
                'kategoris' => $Kategoris->paginate(2, 'kategori'),
                'pager' => $Kategoris->pager
            );

            return view('Kategori', $data);
        }
    }
    

?>