<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of VoyagesController
 *
 * @author wassi
 */
class VoyagesController extends AbstractController {
    
    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
    
    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }

    
    
    
    #[Route('/voyages', name: 'voyages')]
    public function Index(): Response{
        $visites = $this->repository->findAll();
        return $this->render("pages/voyages.html.twig", ['visites' => $visites]);
    }
}
