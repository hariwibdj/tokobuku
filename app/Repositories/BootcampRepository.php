<?php

namespace App\Repositories;

use App\Models\Buku;

class BootcampRepository
{
    public function list()
    {
        return Buku::orderBy('id', 'desc')->get();
    }

    public function detail($bukuID)
    {
        return Buku::where('id', $bukuID)->first();
    }
}
