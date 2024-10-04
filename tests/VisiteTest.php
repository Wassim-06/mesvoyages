<?php


namespace App\Tests;

use App\Entity\Visite;
use App\Entity\Environnement;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Description of VisiteTest
 *
 * @author wassi
 */
class VisiteTest extends TestCase {
    
    public function testGetDatecreationString() {
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2024-04-24"));
        $this->assertEquals("24/04/2024", $visite->getDatecreationString());
    }
    
    public function testAddEnvironnement() {
        $environnement = new Environnement();
        $environnement->setNom("Désert");
        $visite = new Visite();
        $visite->addEnvironnement($environnement);
        $nbavant = $visite->getEnvironnements()->count();
        $visite->addEnvironnement($environnement);
        $nbaprès = $visite->getEnvironnements()->count();
        $this->assertEquals($nbavant, $nbaprès);
    }
}
