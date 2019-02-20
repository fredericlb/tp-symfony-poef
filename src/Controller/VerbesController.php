<?php

namespace App\Controller;

use App\Entity\Verbe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerbesController extends AbstractController
{
    /**
     * @Route("/verbes/random", methods={ "GET" })
     */
    public function getRandomVerb() {
      $verbsRepository = $this->getDoctrine()->getRepository(Verbe::class);

      $allVerbs = $verbsRepository->findAll();

      $idx = intval(rand(0, sizeof($allVerbs) - 1));
      /** @var Verbe $verb */
      $verb = $allVerbs[$idx];
      $output = [
        "baseVerbale" => $verb->getBaseverbale(),
        "traduction" => $verb->getTraduction(),
        "id" => $verb->getId()
      ];

      return new Response(json_encode($output));
    }

    /**
     * @Route("/verbes/check", methods={ "GET" })
     */
    public function checkVerb(Request $req) {
      $preterit = $req->get('preterit');
      $participePasse = $req->get('participePasse');

      $verbRepository = $this->getDoctrine()->getRepository(Verbe::class);

      /** @var Verbe $verb */
      $verb = $verbRepository->find($req->get('id'));

      $hasWon = $preterit === $verb->getPreterit() && $participePasse === $verb->getParticipepasse();

      return new Response($hasWon ? 1 : 0);
    }
}
