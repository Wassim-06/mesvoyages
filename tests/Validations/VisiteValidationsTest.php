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
        $visite = $this->getVisite();
        $this->assertErrors($visite->setNote(10), 0);
        $this->assertErrors($visite->setNote(0), 0);
        $this->assertErrors($visite->setNote(20), 0);

    }
    
    public function testNonValidNoteVisite() {
        $visite = $this->getVisite();
        $this->assertErrors($visite->setNote(21), 1);
        $this->assertErrors($visite->setNote(-1), 1);
        $this->assertErrors($visite->setNote(25), 1);
        $this->assertErrors($visite->setNote(-5), 1);
    }
    public function testValidTempmaxVisite() {
        $visite = $this->getVisite()
                ->setTempmin(20)
                ->setTempmax(22);
        $this->assertErrors($visite, 0);
        $this->assertErrors($visite->setTempmin(21), 0);
    }
    
    
    public function testNonValidTempmaxVisite() {
        $visite = $this->getVisite()
                ->setTempmin(22)
                ->setTempmax(20);
        $this->assertErrors($visite, 1);
        $this->assertErrors($visite->setTempmin(20), 1);

    }
    
    
}