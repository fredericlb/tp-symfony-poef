<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Partie;
use App\Entity\Question;
use App\Entity\Verbe;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartieController extends AbstractController
{

  /**
   * @Route("/partie/{joueur}", methods={ "POST" })
   */
  public function newPartie(Request $req, Joueur $joueur) {
    $entityManager = $this->getDoctrine()->getManager();

    $partie = new Partie();
    $partie->setIdjoueur($joueur);

    $entityManager->persist($partie);
    $entityManager->flush();

    return new Response($partie->getId());
  }

  /**
   * @Route("/partie/{partie}/update", methods={ "GET" })
   */
  public function update(Request $req, Partie $partie) {
    $entityManager = $this->getDoctrine()->getManager();

    $preterit = $req->get('preterit');
    $participePasse = $req->get('participePasse');

    $verbRepository = $this->getDoctrine()->getRepository(Verbe::class);

    /** @var Verbe $verb */
    $idVerbe = $req->get('id');
    $verb = $verbRepository->find($idVerbe);

    $hasWon = $preterit === $verb->getPreterit() && $participePasse === $verb->getParticipepasse();

    if ($hasWon) {
      $q = new Question();
      $q->setIdpartie($partie);
      $q->setIdverbe($verb);
      $q->setReponseparticipepasse($participePasse);
      $q->setReponsepreterit($preterit);
      $q->setDateenvoi(new DateTime());
      $q->setDatereponse(new DateTime());
      $entityManager->persist($q);
    }

    $t = $entityManager->flush();
    return new Response();
  }

  /**
   * @Route("/partie/{partie}/score", methods={ "GET" })
   */
  public function getScore(Request $request, Partie $partie) {

    $questionsRepository = $this->getDoctrine()->getRepository(Question::class);

    $questions = $questionsRepository->findBy(["idpartie" => $partie->getId()]);

    return new Response(sizeof($questions));
  }
}
