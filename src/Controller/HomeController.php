<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\CocktailRepository;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
class HomeController extends AbstractController
{
    /**
     * @Route("/home/{country}", name="home")
     */
    public function index(string $country, ArtworkRepository $artworkRepository, CocktailRepository $cocktailRepository)
    {
        $artworks = $artworkRepository->findArtworksByCountry($country);

        // TODO recup du cocktail id en fonction du pays, ici ex en dur avec l'id de la margarita
        $cocktailId = 11007;
        $cocktail = $cocktailRepository->findCocktail($cocktailId);

        return $this->render('home/index.html.twig', [
            'artworks' => $artworks ?? [],
            'cocktail' => $cocktail,
        ]);
    }


}

