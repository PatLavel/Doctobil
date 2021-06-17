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
        $this->assertCount(5, $rdv);
    }

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $a = $repository->findAll();
        $id = $a[0]->getId();
        $rdv = $repository->find($id);
        $this->assertCount($id, $rdv->getId());
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $a = $repository->findAll();
        $id = $a[0]->getId();
        $rdv = $repository->findOneBy(['id_pat_id' => $id]);
        $this->assertCount($id, $rdv->getIdPat());
    }
}
