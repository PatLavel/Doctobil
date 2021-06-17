<?php

namespace App\Tests\Repository;

use App\DataFixtures\RdvFixtures;
use App\Repository\DocteurRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DocteurRepositoryTest extends KernelTestCase
{

    use FixturesTrait;



    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(DocteurRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $doc = $repository->findAll();
        $this->assertCount(5, $doc);
    }

    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(DocteurRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $doc = $repository->findBy(['specialite' => 'Neurologie']);
        $this->assertCount(5, $doc);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(DocteurRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $a = $repository->findAll();
        $id = $a[0]->getId();
        $doc = $repository->find($id);
        $this->assertEquals($id, $doc->getId());
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(DocteurRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $doc = $repository->findOneBy(['nom' => 'Docteurb']);
        $this->assertEquals('Docteurb', $doc->getNom());
    }
}
