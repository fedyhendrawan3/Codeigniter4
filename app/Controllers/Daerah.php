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
                'daerahs' => $Daerahs->paginate(2, 'daerah'),
                'pager' => $Daerahs->pager
            );

            return view('Daerah', $data);
        }
    }
    

?>