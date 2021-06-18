<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;

class PatientController extends AbstractFOSRestController
{

    /**
     * @Get('Patient')
     * @return void
     */
    public function getAll()
    {
        $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return View::create($docteur, 200);
    }
}
