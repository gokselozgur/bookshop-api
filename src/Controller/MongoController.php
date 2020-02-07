<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Document\User;
use Doctrine\ODM\MongoDB\DocumentManager as DocumentManager;

class MongoController extends AbstractController
{
    /**
     * @Route("/offers", methods={"GET"})
     */
    public function mongoTest(DocumentManager $dm)
    {
        $user = new User();
        $user->setEmail("vincent@vfac.fr");
        $user->setFirstname("Vincent");
        $user->setLastname("Vincent");
        $user->setPassword(md5("VFACP@ssw0rd"));

        $dm->persist($user);
        $dm->flush();
        return new JsonResponse(array('Status' => 'OK'));
    }
}