<?php

namespace App\Controller;

use DateTime;
use App\Entity\Patient;
use FOS\RestBundle\View\View;
use Doctrine\Persistence\ObjectManager;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\BrowserKit\Request;

class PatientController extends AbstractFOSRestController
{

    /**
     * @Get("Patient")
     * @return void
     */
    public function getAll()
    {
        $docteur = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return View::create($docteur, 200, ["content/type => application/json"]);
    }

    /**
     * 
     * @Get("Patient/{id}")
     * @return void
     */
    public function getOneBy(Patient $patient)
    {
        return View::create($patient, 200, ["content/type => application/json"]);
    }

    /**
     * @Post("/Patient")
     */
    public function create(Patient $patient)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($patient);
        $manager->flush();
        return View::create(null, 200);
    }
}
