<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts", methods={"GET"})
    */
    public function listeContact(ContactRepository $repo)
    {
        $lesContacts=$repo->findAll();
        return $this->render('contact/listeContacts.html.twig',[
            'lesContacts' => $lesContacts
        ]);
    }

    /**
     * @Route("/contact/{id}", name="ficheContact", methods={"GET"})
    */
    public function ficheContact(Contact $contact )
    {
        return $this->render('contact/ficheContact.html.twig', [
            'leContact' => $contact
        ]); 
    }

    /**
 * @Route("/contact/sexe/{sexe}", name="listeContactsSexe", methods={"GET"})
*/
public function listeContactsSexe($sexe, ContactRepository $repo)
{
    // $lesContacts = $repo->findBy(
    //   ['sexe' => $sexe],
    //   [ 'nom'=> 'ASC']
    // );
    $lesContacts=$repo->findBySexe($sexe);
    return $this->render('contact/listeContacts.html.twig', [
        'lesContacts' => $lesContacts
    ]); 
}
}