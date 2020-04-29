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
 //   /**
 //    * @Route("/home/all", name="home_all")
 //    */
 //   public function list(TodoRepository $todoRepository)
 //   {
 //       $todos = $todoRepository->findAllTodo();
 //       return $this->render('home/list.html.twig', [
 //           'todos' => $todos,
 //       ]);
 //   }

 //   /**
 //    * @Route("/home/{id}", name="home")
 //    */
 //   public function index(int $id, TodoRepository $todoRepository)
 //   {
 //       $todo = $todoRepository->findTodo($id);
 //       dump($todo);
 //       return $this->render('home/index.html.twig', [
 //           'todo' => $todo,
 //      ]);
 //   }

    /**
     * @Route("/home/all", name="home_country_all")
     */
    public function list(WebcamRepository $webcamRepository)
    {
        $webcams = $webcamRepository->findAllWebcam();
        return $this->render('home/list.html.twig', [
            'webcams' => $webcams,
        ]);
    }

    /**
     * @Route("/home/{id}", name="home_country")
     */
    public function index(int $id, WebcamRepository $webcamRepository)
    {
        $webcam = $webcamRepository->findWebcam($id);
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

