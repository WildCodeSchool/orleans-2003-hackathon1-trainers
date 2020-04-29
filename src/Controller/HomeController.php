<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\TodoRepository;
use App\Repository\WebcamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/{country}", name="home")
     */
    public function index(string $country, WebcamRepository $webcamRepository)
    {
        $webcam = $webcamRepository->findWebcamByCountry($country);
        return $this->render('home/index.html.twig', [
            'webcam' => $webcam,
        ]);
    }

 //   /**
 //    * @Route("/home/{country}", name="home")
 //    */
 //   public function index(string $country, ArtworkRepository $artworkRepository)
 //   {
 //       $artworks = $artworkRepository->findArtworksByCountry($country);
//
//        return $this->render('home/index.html.twig', [
//            'artworks' => $artworks,
//        ]);
//    }

}

