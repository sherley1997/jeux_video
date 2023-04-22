<?php

namespace App\Controller;

use App\Services\AppHelpers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends AbstractController
{
    private string $bodyId;
    private $user;

    public function __construct(AppHelpers $app) {

        $this->bodyId = $app->getBodyId('ADMIN_DASHBOARD');
        $this->user = $app->getUser();
    }
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
            'bodyId' => $this->bodyId,
            'userInfo' => $this->user,
        ]);
    }

    public function memberManagement(AppHelpers $app): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        
        return $this->render('admin/member-management.html.twig', [
            'bodyId' => $app->getBodyId('ADMIN_MEMBER_MANAGEMENT'),
            'userInfo' => $this->user,
        ]);
    }
}
