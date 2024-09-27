<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of VoyagesController
 *
 * @author wassi
 */
class VoyagesController extends AbstractController {
    
    #[Route('/voyages', name: 'voyages')]
    public function Index(): Response{
        return $this->render("pages/voyages.html.twig");
    }
}
