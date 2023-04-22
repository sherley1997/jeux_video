<?php

namespace App\Controller;

use App\Services\AppHelpers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    private string $bodyId;
    private $user;
    public function __construct(AppHelpers $app)
    {
        $this->bodyId = $app->getBodyId('HOME_PAGE');
        $this->user = $app->getUser();
    }

    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bodyId' => $this->bodyId,
            'userInfo' => $this->user,
        ]);
    }
}
