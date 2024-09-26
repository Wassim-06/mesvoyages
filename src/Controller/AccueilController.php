<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author wassi
 */

class AccueilController {
    
    #[Route('/', name: 'accueil')]
    public function Index(): Response{
        return new Response('Hello world');
    }
}
