<?php

namespace App\Controller;

use OpenApi\Annotations as OA;


use App\DTO\DocteurDTO;
use App\Entity\Docteur;
use FOS\RestBundle\View\View;
use App\Service\DocteurService;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Put;
use Symfony\Component\HttpFoundation\Response;
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
     * @Get("Docteur")
     * @return void
     * 
     */

    public function getAll()
    {
        $docteur = $this->getDoctrine()->getRepository(Docteur::class)->findAll();
        return View::create($docteur, 200);
    }

    /**
     * @Get("Docteur/{id}")
     * @return void
     * 
     */

    public function getById(Docteur $docteur)
    {
        return View::create($docteur, 200);
    }

    /**
     * @Get("/Docteur/Delete/{id}")
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
     * @Post("/Docteur")
     * @ParamConverter("DocteurDTO", converter="fos_rest.request_body")
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

    public function createDoc(DocteurDTO $DocteurDTO)
    {
        if (!$this->docteurService->save($DocteurDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }


    /**
     * @Put("/Docteur/Edit/{id}")
     * @ParamConverter("DocteurDTO", converter="fos_rest.request_body")
     * @return void
     */

    public function putDoc(int $id, DocteurDTO $DocteurDTO)
    {
        if (!$this->docteurService->put($id, $DocteurDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }
}
