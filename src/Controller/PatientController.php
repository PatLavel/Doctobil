<?php

namespace App\Controller;

use App\DTO\PatientDTO;
use App\Entity\Patient;
use FOS\RestBundle\View\View;
use OpenApi\Annotations as OA;
use App\Service\PatientService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Post;
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
     * @Get("patients")
     * @return void
     */
    public function getAll()
    {
        $patientDto = $this->patientService->findAll();
        return View::create($patientDto, 200, ["content/type => application/json"]);
    }

    /**
     * 
     * @Get("patients/{id}")
     * 
     * @param int $id
     * @return void
     */
    public function getOneBy(PatientDTO $patientDTO)
    {
        return View::create($patientDTO, 200, ["content/type => application/json"]);
    }



    /**
     * @OA\Post(
     *     path="/Patient",
     *     tags={"Patient"},
     *     operationId="create",
     *     @OA\Response(
     *         response=201,
     *         description="Patient created"
     *     ),
     *     @OA\Response(
     *          response=405,
     *          description="Input Invalid"
     *     ),
     * requestBody={"$ref": "#/components/requestBodies/PatientDTO"}
     * )
     * @Post("/patients")
     * @ParamConverter("patientDTO", converter = "fos_rest.request_body")
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
     * @Get("/patients/Delete/{id}")
     * 
     * @return void
     */
    public function deletePat(int $id)
    {

        if (!$this->patientService->remove($id)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }

    	
    /**
     * @Put("/patients/Edit/{id}")
     * @ParamConverter("patientDTO", converter="fos_rest.request_body")
     * @return void
     */

    public function putPat(PatientDTO $patientDTO,Patient $patient)
    {
        if (!$this->patientService->put($patientDTO , $patient)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }
    
}

