<?php

namespace App\Controller;

use App\Entity\Docteur;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;

use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;

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
     * @Post("/Docteur")
     * 
     * @return void
     */
    public function postDocteur(Docteur $docteur)
    {
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($docteur);
        $em->flush();
        Return View::create(null,200);


    }


    /**
     * @Post("/Doc")
     * 
     * @return void
     */
    public function postDoc(Request $request)
    {
        $data = new Docteur;
        $nom = $request->get('nom');
        $prenom = $request->get('prenom');
        $ville = $request->get('ville');
        $data->setNom($nom);
        $data->setPrenom($prenom);
        $data->setVille($ville);
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return new View("User Added Successfully", Response::HTTP_OK);
    }
}
