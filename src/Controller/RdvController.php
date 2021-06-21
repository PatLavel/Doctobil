<?php

namespace App\Controller;

use DateTime;
use App\Entity\Rdv;
use FOS\RestBundle\View\View;
use Doctrine\Persistence\ObjectManager;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\BrowserKit\Request;

class RdvController extends AbstractFOSRestController
{
    // /**
    //  * @Get("Rdv")
    //  * @return void
    //  */
    // public function getAll()
    // {
    //     $rdv = $this->getDoctrine()->getRepository(Rdv::class)->findAll();
    //     return View::create($rdv, 200, ["content/type => application/json"]);
    // }

    // /**
    //  * @Get("Rdv/{id})
    //  * 
    //  */
    // public function getOneBy(Rdv $rdv)
    // {
    //     return View::create($rdv, 200, ["content/type => application/json"]);
    // }
}
