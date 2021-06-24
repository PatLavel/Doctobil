<?php

namespace App\Controller;

use App\DTO\DocteurDTO;
use App\Entity\Docteur;
use FOS\RestBundle\View\View;
use OpenApi\Annotations as OA;
use App\Service\DocteurService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DocteurController extends AbstractFOSRestController
{

    private $docteurService;

    public function __construct(DocteurService $docteurService)
    {
        $this->docteurService = $docteurService;
    }

    /**
     * @Get("docteurs")
     * @return void
     * 
     */

    public function getAll()
    {
        $docteur = $this->getDoctrine()->getRepository(Docteur::class)->findAll();
        return View::create($docteur, 200);
    }

    /**
     * @Get("docteurs/{id}")
     * @return void
     * 
     */

    public function getById(Docteur $docteur)
    {
        return View::create($docteur, 200);
    }

    /**
     * @Get("/docteurs/Delete/{id}")
     * 
     * @return void
     */
    public function deleteDoc(int $id)
    {
        if (!$this->docteurService->remove($id)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }

    /**
     *  
     * @Post("/docteurs")
     * @ParamConverter("docteurDTO", converter="fos_rest.request_body")
     * 
     * Add a new Docteur
     * 
     * @OA\Post(
     *     path="/Docteur",
     *     tags={"Docteur"},
     *     operationId="addDocteur",
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     requestBody={"$ref": "#/components/requestBodies/DocteurDTO"}
     * )
     * 
     * @return void
     */

    public function createDoc(DocteurDTO $docteurDTO)
    {
        if (!$this->docteurService->save($docteurDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }


    /**
     * @Put("/docteurs/Edit/{id}")
     * @ParamConverter("docteurDTO", converter="fos_rest.request_body")
     * @return void
     */

    public function putDoc(Docteur $docteur, DocteurDTO $docteurDTO)
    {
        if (!$this->docteurService->put($docteur, $docteurDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }
}
