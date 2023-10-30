<?php

namespace App\Controller;

use App\Database\PlayerDatabase;

class HomeController extends AbstractController
{
    public function index(): string
    {
        return $this->render('home/index.html.php');
    }
}