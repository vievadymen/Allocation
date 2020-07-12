<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Chambre;
use App\Form\ChambreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ChambreRepository;

class ChambreController extends AbstractController
{
    /**
     * @Route("/chambre", name="chambre")
     */
    public function index()
    {
        return $this->render('chambre/index.html.twig', [
            'controller_name' => 'ChambreController',
        ]);
    }

    /**
     * @Route("/chambre/addchambre", name="addchambre")
     */
    public function addchambre( Request $request, EntityManagerInterface $em ) :Response {

        $chambre = new Chambre();
        $formChambre = $this->createForm(ChambreType::class, $chambre);
        $formChambre->handleRequest($request);
        if ($formChambre->isSubmitted() && $formChambre->isValid()) {
            $em->persist($chambre);
            $em->flush();
        }

        return $this->render('/chambre/addchambre.html.twig',[
            'formChambre'=>$formChambre->createView()
        ]);
    }

    /**
     * @Route("/chambre/listchambre", name="listchambre")
     */
    public function listchambre( ChambreRepository $repo, PaginatorInterface $paginator, Request $request ) {

        $chambres = $repo->findAll(); // Afficher l'intégralité de l'entité Chambre
        
        $pagination= $paginator->paginate(
            $chambres,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('/chambre/listchambre.html.twig', [
            'Chambres' => $pagination
        ]);
    }

    /**
     * @Route("/chambre/{id<[0-9]+>}/update", name="chambre_update")
     */
    public function update(Request $request, EntityManagerInterface $em, chambre $chambre):Response
    {
        $formChambre = $this->createForm(chambreType::class, $chambre);
        $formChambre->handleRequest($request);
        if($formChambre->isSubmitted() && $formChambre->isValid()){
         
         /* $em->persist($chambre); */
         $em->flush();
      }
      //dump($form);
      return $this->render('chambre/addchambre.html.twig',[
          'chambre'=> $chambre,
          'formChambre' => $formChambre->createView(),
      ]);
    
    }
}
