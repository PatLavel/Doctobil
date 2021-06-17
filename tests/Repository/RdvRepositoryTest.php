<?php

namespace App\Tests\Repository;


use App\DataFixtures\RdvFixtures;
use App\Repository\RdvRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RdvRepositoryTest extends KernelTestCase
{

    use FixturesTrait;



    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdv = $repository->findAll();
        $this->assertCount(5, $rdv);
    }

    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdv = $repository->findBy(['date' => '2021-05-05']);
        $this->assertCount(1, $rdv);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $rdv = $repository->find();
        $this->assertCount(1, $rdv);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $a = $repository->findAll();
        $id = $a[0]->getId();
        $this->loadFixtures([RdvFixtures::class]);
        $rdv = $repository->findOneBy($id);
        $this->assertCount($id, $rdv->getId());
    }
}
