<?php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use App\Repository\CocktailRepository;
use App\Repository\CountryCocktailRepository;
use App\Repository\TodoRepository;
use App\Repository\WebcamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends AbstractController
{
    /**
     * @Route("/home/{country}", name="home")
     * @param string $country
     * @param ArtworkRepository $artworkRepository
     * @param CocktailRepository $cocktailRepository
     * @param WebcamRepository $webcamRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        string $country,
        ArtworkRepository $artworkRepository,
        CocktailRepository $cocktailRepository,
        WebcamRepository $webcamRepository,
        CountryCocktailRepository $countryCocktailRepository) {

        $webcam = $webcamRepository->findWebcamByCountry($country);
        $countryName = Countries::getName($country);
        $artworks = $artworkRepository->findArtworksByCountry($countryName);

        $cocktailCountry = $countryCocktailRepository->findOneByCountryIso($country);
        if ($cocktailCountry) {
            $cocktail = $cocktailRepository->findCocktail($cocktailCountry->getCocktailApiId());
        }

        return $this->render('home/index.html.twig', [
            'artworks' => $artworks ?? [],
            'cocktail' => $cocktail ?? null,
            'webcam' => $webcam,
        ]);
    }
}


