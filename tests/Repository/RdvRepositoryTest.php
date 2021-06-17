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
        $patients = $repository->findAll();
        $this->assertCount(5, $patients);
    }

}
