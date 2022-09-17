<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('registerform');
    }

    public function list()
    {
        return view('listEmployee');
    }
}
