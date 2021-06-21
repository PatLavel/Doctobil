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
    /**
     * @Get("Rdv")
     * @return void
     */
    public function getAll()
    {
        $rdv = $this->getDoctrine()->getRepository(Rdv::class)->findAll();
        return View::create($rdv, 200, ["content/type => application/json"]);
    }

    /**
     * @Get("Rdv/{id})
     * 
     */
    public function getOneBy(Rdv $rdv)
    {
        return View::create($rdv, 200, ["content/type => application/json"]);
    }

    /**
     * @Post("/Rdv")
     * @ParamConverter("rdv", converter = "fos_rest.request_body")
     * @return void
     */
    public function create(Rdv $rdv)
    {
        $manager = $this->getDoctrine()->getManager();
        $repoDoc = $this->getDoctrine()->getRepository(Docteur::class);
        $repoPat = $this->getDoctrine()->getRepository(Patient::class);
        if ($repoDoc->find($rdv->getIdDoc()->getId()) == null) {
            $manager->persist($rdv->getIdDoc());
        } else {
            $doc = $repoDoc->find($rdv->getIdDoc()->getId());
            $rdv->setIdDoc($doc);
        }
        if ($repoPat->find($rdv->getIdPat()->getId()) == null) {
            $manager->persist($rdv->getIdPat());
        } else {
            $pat = $repoPat->find($rdv->getIdPat()->getId());
            $rdv->setIdDoc($pat);
        }
        $manager->persist($rdv);
        $manager->flush();
        return View::create(null, 200);
    }
}
