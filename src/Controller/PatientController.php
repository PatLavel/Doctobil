<?php

namespace App\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class PatientController extends AbstractFOSRestController
{

    /**
     * @Get('Patient')
     * @return void
     */
    public function getAll()
    {
        $docteur = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return View::create($docteur, 200);
    }
}
