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
    }
    

?>