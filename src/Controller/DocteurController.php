<?php

namespace App\Controller;

use App\Entity\Docteur;
use FOS\RestBundle\View\View;
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

        $em = $this->getDoctrine()->getManager();

        $docteur = $em->getRepository(Docteur::class)->find($id);

        $em->remove($docteur);
        $em->flush();
        return new View("Docteur Removed Successfully", Response::HTTP_OK);
    }

    /**
     * @Post("/Docteur")
     * @ParamConverter("docteur", converter="fos_rest.request_body")
     * @return void
     */
    public function postDocteur(Docteur $docteur)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($docteur);
        $em->flush();
        return View::create(null, 200);
    }
}
