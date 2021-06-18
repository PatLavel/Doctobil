<?php
namespace App\Controller;

use App\Entity\Docteur;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class DocteurController extends AbstractFOSRestController
{
    /**
     * 
     * 
     * @Get("docteur")
     * @return void
     * 
     */

        public function getall(){
            $docteur = $this->getDoctrine()->getRepository(Docteur::class)->findAll();
            return View::create($docteur,200);
        }


}

    ?>