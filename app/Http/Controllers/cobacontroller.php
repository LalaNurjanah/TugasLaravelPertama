<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cobacontroller extends controller
{
    public function index ()
    {
        return 'test berhasil';
    }
    public function urutan($ke)
    {
        
        $numbers = [
           [ 'ke' => 1, 'nomor' => 20],
           [ 'ke' => 2, 'nomor' => 30],
           [ 'ke' => 3, 'nomor' => 40],
        ];
        return view('urutan', compact('numbers'));
    }
    public function coba($ke)
    {
        return view('coba', ['ke' => $ke]);
    }
}


