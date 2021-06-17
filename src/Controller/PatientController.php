<?php

use App\Service\PatientService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PatientController extends AbstractController{

    private $PatientService;

    public function __construct(PatientService $Service)
    {
        $this->PatientService = $Service;
    }
    
}

?>