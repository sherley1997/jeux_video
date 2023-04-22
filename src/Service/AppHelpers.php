<?php
namespace App\Services;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class AppHelpers
{
    
    private $params;
    private $doctrine;
    private $security;
    private $user;
    private $db;

    public function __construct(ContainerBagInterface $params, ManagerRegistry $doctrine, Security $security) {
        $this->params = $params;
        $this->doctrine = $doctrine;
        $this->db = $doctrine->getManager();
        $this->security = $security;
        $this->user = $this->security->getUser();
    }

    public function getBodyId(string $page) {
        return $this->params->get($page);
    }

    public function getUser()
    {
        $user = $this->security->getUser();
        
        if($user){
            $isloggedIn = true;
        } else {
            $isloggedIn = false;
        }

        if($this->security->isGranted('ROLE_ADMIN')){
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }

        $userObj = new \stdClass();
        $userObj->user = $user;
        $userObj->isLoggedIn = $isloggedIn;
        $userObj->isAdmin = $isAdmin;

        return $userObj;
    }
    
}