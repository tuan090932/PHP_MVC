<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {

        $data = compact('products');

        require_once 'app/Views/home.php';
    }
}
