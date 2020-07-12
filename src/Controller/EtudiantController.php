<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\EtudiantRepository;
use Knp\Component\Pager\PaginatorInterface;


class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function index()
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'etudiantController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home() {
        return $this->render('/etudiant/home.html.twig');
    }

    /**
     * @Route("/etudiant/addetudiant", name="addetudiant")
     */
    public function addetudiant( Request $request, EntityManagerInterface $em ) :Response {

        $rp = $em->getRepository(Etudiant::class);
        $nbrField = count($rp->findAll());
        $etudiant = new Etudiant();
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);
        if($formEtudiant->isSubmitted() && $formEtudiant->isValid() ) {

            $em->persist($etudiant);
            $em->flush();
        }


        return $this->render('/etudiant/addetudiant.html.twig', [
            'formEtudiant'=>$formEtudiant->createView(),
            'nbrField' => $nbrField
        ]);
    }

    /**
     * @Route("/etudiant/listetudiant", name="listetudiant")
     */
    public function listetudiant( EtudiantRepository $repo, PaginatorInterface $paginator, Request $request ) {

        $etudiants = $repo->findAll(); // Afficher l'intégralité de l'entité Etudiant

        return $this->render('/etudiant/listetudiant.html.twig', [
            'etudiants' => $etudiants
        ]);
    }

    /**
     * @Route("/etudiant/{id<[0-9]+>}/update", name="etudiant_update")
     */
    public function update(Request $request, EntityManagerInterface $em, Etudiant $etudiant):Response
    {
        $rp = $em->getRepository(Etudiant::class);
        $nbrField = count($rp->findAll());
        $formEtudiant = $this->createForm(EtudiantType::class, $etudiant);
        $formEtudiant->handleRequest($request);
        if($formEtudiant->isSubmitted() && $formEtudiant->isValid()){
         
         /* $em->persist($etudiant); */
         $em->flush();
      }
      //dump($form);
      return $this->render('etudiant/addetudiant.html.twig',[
          'etudiant'=> $etudiant,
          'formEtudiant' => $formEtudiant->createView(),
            'nbrField' => $nbrField,
      ]);
    
    }

    /**
     * @Route("/etudiant/{id<[0-9]+>}/delete", name="etudiant_delete")
     */
    public function delete(EntityManagerInterface $em, Etudiant $etudiant):Response
    {
       $em->remove($etudiant);
       $em->flush();
       return $this->redirectToRoute('listetudiant');
        }
}
