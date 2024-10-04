<?php

namespace App\Tests\Validations;

use App\Entity\Visite;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Description of VisiteValidationsTest
 *
 * @author wassi
 */
class VisiteValidationsTest extends KernelTestCase {
    
    public function getVisite() {
        $visite = new Visite();
        $visite 
            ->setVille("New York")
            ->setPays("USA");
        return $visite;
    }
    
    public function assertErrors(Visite $visite, int $nbErreursAttendues, string $message="") {
        self::bootKernel();
        $validator = self::getContainer()->get(ValidatorInterface::class);
        $error = $validator->validate($visite);
        $this->assertCount($nbErreursAttendues, $error, $message);
    }
    
    public function testValidNoteVisite() {
        $visite = $this->getVisite()->setNote(10);
        $this->assertErrors($visite, 0);
    }
    
    public function testNonValidNoteVisite() {
        $visite = $this->getVisite()->setNote(21);
        $this->assertErrors($visite, 1);
    }
    
    public function testNonValidTempmaxVisite() {
        $visite = $this->getVisite()
                ->setTempmin(22)
                ->setTempmax(20);
        $this->assertErrors($visite, 1, "min=20, max=18 devrait échouer");
    }
    
    
}
