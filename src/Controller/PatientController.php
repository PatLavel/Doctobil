<?php

namespace App\Controller;

use DateTime;
use App\Entity\Patient;
use FOS\RestBundle\View\View;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PatientController extends AbstractFOSRestController
{

    /**
     * @Get("Patient")
     * @return void
     */
    public function getAll()
    {
        $patient = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        return View::create($patient, 200, ["content/type => application/json"]);
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

    // /**
    //  * @Delete("Patient/{id}")
    //  */

    /**
     * @Post("/Patient")
     * @ParamConverter("patient", converter = "fos_rest.request_body")
     * @return void
     */
    public function create(Patient $patient)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($patient);
        $manager->flush();
        return View::create(null, 200);
    }

    // /**
    //  * @Put("/Patient/Edit/{id}")
    //  *
    //  */
    // public function update($id)
    // {
    //     $manager = $this->getDoctrine->getManager();
    //     $patient = $entityManager->getRepository(Patient::class)->find($id);
    // }
}
