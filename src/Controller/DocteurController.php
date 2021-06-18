<?php
namespace App\Controller;

use Doctrine\DBAL\Schema\View;
use FOS\RestBundle\Controller\Anottations\Get;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class DocteurController extends AbstractFOSRestController
{
    /**
     * 
     * @get("docteur")
     * @return void
     * 
     */

        public function getall(){
           $this->getDoctrine()->getRepository(Patient::class)->findAll();
            return View::create($docteur,200);
        }


}

    ?>