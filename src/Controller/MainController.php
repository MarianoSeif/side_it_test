<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Repository\BlmozoRepository;

class MainController extends Controller
{
    public function index()
    {
        return $this->render('index.html.twig', [
            'searchValue' => '',
        ]);
        
    }

    public function listarMozos(BlmozoRepository $blmozoRepository)
    {
    	$mozos = $blmozoRepository->getMozoConSueldo();
    	dump($mozos);
    	die();

    	return 0;
    }
}
