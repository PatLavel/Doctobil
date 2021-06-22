<?php

namespace App\Controller;

use DateTime;
use App\DTO\RdvDTO;
use App\Entity\Rdv;
use App\Service\RdvService;
use FOS\RestBundle\View\View;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\BrowserKit\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RdvController extends AbstractFOSRestController
{

    private $rdvService;

    public function __construct(RdvService $rdvService)
    {
        $this->rdvService = $rdvService;
    }


    /**
     * @Get("rdvs")
     * @return void
     */
    public function getAll()
    {
        $rdv = $this->getDoctrine()->getRepository(Rdv::class)->findAll();
        return View::create($rdv, 200, ["content/type => application/json"]);
    }

    /**
     * @Get("rdvs/{id}")
     * @return void
     */
    public function getOneBy(Rdv $rdv)
    {
        return View::create($rdv, 200, ["content/type => application/json"]);
    }

    /**
     * @Post("/rdvs")
     * @ParamConverter("rdvDTO", converter = "fos_rest.request_body")
     * @return void
     */
    public function create(RdvDTO $rdvDTO)
    {
        if (!$this->rdvService->create($rdvDTO)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);

    }
    /**
     * @Get("/rdvs/Delete/{id}")
     * 
     * @return void
     */
    public function removeRdv(int $id)
    {
        if (!$this->rdvService->remove($id)) {
            return View::create(null, 404);
        }
        return View::create(null, 201);

        
    }
}
