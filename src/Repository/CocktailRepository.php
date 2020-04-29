<?php


namespace App\Repository;


use App\Entity\Cocktail;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class CocktailRepository
{
    const API_URL = 'https://www.thecocktaildb.com/api/json/v1/1/';

    public function findCocktail(int $id): ?Cocktail
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL . 'lookup.php?i=' . $id);

        if($response->getStatusCode() === Response::HTTP_OK) {
            $apiCocktail = $response->toArray()['drinks'][0] ?? [];
            if(!empty($apiCocktail)) {
                $cocktail = new Cocktail($apiCocktail);
            }
        }

        return $cocktail ?? null;
    }


}
