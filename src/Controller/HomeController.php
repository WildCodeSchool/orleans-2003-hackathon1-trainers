<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
class HomeController extends AbstractController
{
    /**
     * @Route("/home/{country}", name="home")
     */
    public function index(string $country, ArtworkRepository $artworkRepository)
    {
        $countryName = Countries::getName($country);

        $artworks = $artworkRepository->findArtworksByCountry($countryName);

        return $this->render('home/index.html.twig', [
            'artworks' => $artworks,
        ]);
    }


}

