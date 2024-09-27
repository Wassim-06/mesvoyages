<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author wassi
 */

class AccueilController extends AbstractController{
    
    #[Route('/', name: 'accueil')]
    public function Index(): Response{
        return $this->render("pages/accueil.html.twig");
    }
}
