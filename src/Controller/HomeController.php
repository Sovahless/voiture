<?php

namespace App\Controller;

use App\Entity\Voiture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @var \string[][]
     */
    private $articles = [
        ['titre'=>'Article 1', 'resume'=>'résumé article 1'],
        ['titre'=>'Article 2', 'resume'=>'résumé article 2'],
        ['titre'=>'Article 3', 'resume'=>'résumé article 3'],
    ];
    /**
     * @Route("/home", name="home", methods={"GET"})
     * @return Response
     */
    public function welcome()
    {
        // je déclare un tableau d'argument
        $tableau = [1, 2, "abc"];
        return $this->render("front/home.html.twig", [
            "tableau" => $tableau,
            "titre" => "un titre de bienvenue", // je déclare une string
        ]);
//        return new Response(
//            "<html><head><title>Bienvenue</title></head><body></body></html>"
//        );
    }

    /**
     * @Route("/page/{numPage}", name="app_page", methods={"GET"}, requirements={"numPage"="\d+"})
     * @param string $numPage
     * @return Response
     */
    public function pages( int $numPage = 1 )
    {
      return $this->render("front/page.html.twig", [
         "numPage" => $numPage,
      ]);
    }

//    public function pageDeux()
//    {
//        return new Response(
//            "<html><head><title>Page2</title></head><body><h2>Vous êtes sur la page 2</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium alias commodi deserunt eius eligendi esse facere, impedit labore nemo placeat repudiandae tenetur, ut? Ea illo, molestiae officia quo similique voluptate.</p></body></html>"
//        );
//    }

    /**
     * @Route("/page/{slug}", name="app_slug", methods={"GET"})
     * @param string $slug
     * @return void
     */
    public function autrePage(string $slug)
    {
        return new Response(
            "<html>
                        <head>
                            <title>Page $slug</title>
                        </head>
                        <body>
                        <h2>Vous êtes sur la page $slug</h2>
                        <p><a href='/home'>retour</a> </p>
                        <p>Une autre page</p></body></html>"
        );
    }

    /**
     * @Route("/listeVoiture", name="listeVoiture", methods={"GET"})
     * @return void
     */
    public function listeVoiture()
    {
        return $this->render("front/template_part/_listeVoiture.html.twig",[
            'voiture' => $this->voiture,
        ]);
    }

    /**
     * @Route("voiture/{numArt}", name="voiture", methods={"GET"}, requirements={"numArt"="\d+"})
     * @param int $numArt
     * @return Response
     */
    public function Voiture(int $numArt)
    {
        return $this->render("front/voiture.html.twig",[
            'voiture'=> $this->voiture[$numArt] // ['titre'=>'valeur',"resume'=>"valeur"]
        ]);
    }

    public function voitureFiltre(){
        return $this->render("front/listeFiltre.html.twig", ['voiture => $voiture']);
    }
}