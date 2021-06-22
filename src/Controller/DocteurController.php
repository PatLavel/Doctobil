<?php

namespace App\Controller;

use App\DTO\DocteurDTO;
use App\Entity\Docteur;
use FOS\RestBundle\View\View;
use App\Service\DocteurService;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class DocteurController extends AbstractFOSRestController
{
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
        // $em = $this->getDoctrine()->getManager();
        // $docteur = $em->getRepository(Docteur::class)->find($id);
        // $em->remove($docteur);
        // $em->flush();

        if(!$this->DocteurService->remove($id)){
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }
    
    /**
     *  
     * @Post("/Docteur")
     * @ParamConverter("DocteurDTO", converter="fos_rest.request_body")
     * @return void
     */
    public function create(DocteurDTO $DocteurDTO)
    {
        if(!$this->DocteurService->save($DocteurDTO)){
            return View::create(null, 404);
        }
        return View::create(null, 201);
    }
}
