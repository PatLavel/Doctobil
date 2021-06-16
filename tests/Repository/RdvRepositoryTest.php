<?php

namespace App\Tests\Repository;


use App\DataFixtures\RdvFixtures;
use App\Repository\DocteurRepository;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RdvRepositoryTest extends KernelTestCase
{

    use FixturesTrait;

    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(DocteurRepository::class);
        $this->loadFixtures([RdvFixtures::class]);
        $patients = $repository->findAll();
        $this->assertCount(5, $patients);
    }
}
