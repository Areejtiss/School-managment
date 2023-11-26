<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BootStarapController extends AbstractController
{
    #[Route('/boot/starap', name: 'app_boot_starap')]
    public function index(): Response
    {
        $a=5;
        $ch="abcd efgh";
        $b=10;
        return $this->render('boot_starap/index.html.twig', [
            'controller_name' => 'BootStarapController', 'a'=>$a,'b'=>$b,'ch'=>"abcd efgh"
        ]);
    }
}
