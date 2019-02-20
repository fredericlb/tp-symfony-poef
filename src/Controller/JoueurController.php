<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Ville;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JoueurController extends AbstractController
{
  /**
   * @Route("/joueur", methods={"POST"})
   */
  public function createUser(Request $req) {
    $content = $req->getContent();
    $data = json_decode($content);

    $entityManager = $this->getDoctrine()->getManager();
    $villesRepository = $this->getDoctrine()->getRepository(Ville::class);

    /** @var Ville $ville */
    $ville = $villesRepository->find($data->idville);

    $joueur = new Joueur();
    $joueur->setEmail($data->email);
    $joueur->setNom($data->nom);
    $joueur->setPrenom($data->prenom);
    $joueur->setMotdepasse($data->motdepasse);
    $joueur->setIdville($ville);
    //$joueur->setIdville($data->idville);
    $joueur->setNiveau($data->niveau);

    $entityManager->persist($joueur);
    $entityManager->flush();

    return new Response($joueur->getId());
  }
}
