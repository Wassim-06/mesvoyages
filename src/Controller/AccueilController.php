<?php

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author wassi
 */

class AccueilController extends AbstractController{
    
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
    
    #[Route('/', name: 'accueil')]
    public function Index(): Response{
        $visites = $this->repository->derniersVoyages('datecreation', 'DESC');
        return $this->render("pages/accueil.html.twig", ['visites' => $visites]);
    }
    
    
}
