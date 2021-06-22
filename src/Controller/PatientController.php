<?php

namespace App\Controller;

use DateTime;
use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Mapper\PatientMapper;
use FOS\RestBundle\View\View;
use App\Service\PatientService;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PatientController extends AbstractFOSRestController
{

    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * @Get("Patient")
     * @return void
     */
    public function getAll()
    {
        $patientDto = $this->patientService->findAll();
        return View::create($patientDto, 200, ["content/type => application/json"]);
    }

    /**
     * 
     * @Get("Patient/{id}")
     * 
     * @param int $id
     * @return void
     */
    public function getOneBy(PatientDTO $patientDTO)
    {
        return View::create($patientDTO, 200, ["content/type => application/json"]);
    }



    /**
     * @Post("/Patient")
     * @ParamConverter("patient", converter = "fos_rest.request_body")
     * @return void
     */
    public function create(PatientDTO $patientDTO)
    {
        if (!$this->patientService->save($patientDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }

    /**
     * @Get("/Patient/Delete/{id}")
     * 
     * @return void
     */
    public function deletePat(int $id)
    {



        $patient = $this->patientService->getRepository(PatientDTO::class)->find($id);

        $this->entityManager->remove($patient);
        $this->entityManager->flush();
        return new View("Patient Removed Successfully", Response::HTTP_OK);
    }
}
