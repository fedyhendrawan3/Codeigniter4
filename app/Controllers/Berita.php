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
                'beritas' => $Beritas->paginate(2, 'berita'),
                'pager' => $Beritas->pager
            );

            return view('Berita', $data);
        }
    }
    

?>