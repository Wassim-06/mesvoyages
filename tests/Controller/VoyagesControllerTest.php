<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of VoyagesControllerTest
 *
 * @author wassi
 */
class VoyagesControllerTest extends WebTestCase{
    public function testAccesPage() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
    }
    
    public function testContenuPage() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/voyages');
        $this->assertSelectorTextContains('h1', 'Mes voyages');
        $this->assertSelectorTextContains('th', 'Ville');
        $this->assertSelectorTextContains('h5', 'Ludwigsburg');
        $this->assertCount(4, $crawler->filter('th'));
    }
    
    public function testLinkVille() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        $client->clickLink('Ludwigsburg');
        $response = $client->getResponse();
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $uri = $client->getRequest()->server->get("REQUEST_URI");
        $this->assertEquals('/voyages/voyage/3', $uri);
    }
    
    public function testFiltreVille() {
        $client = static::createClient();
        $client->request('GET', '/voyages');
        
        $crawler = $client->submitForm('filtrer', [
            'recherche' => 'Ludwigsburg'
        ]);
        $this->assertCount(1, $crawler->filter('h5'));
        $this->assertSelectorTextContains('h5', 'Ludwigsburg');
    }
}
