<?php


namespace App\Repository;


use App\Entity\Artwork;
use App\Entity\Todo;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class ArtworkRepository
{
    const API_URL = 'https://collectionapi.metmuseum.org/public/collection/v1/';
    const MAX_ARTWORK = 2;

    public function findArtworksByCountry(string $country, $category='Paintings'): array
    {
        $client = HttpClient::create();
        $country = ucfirst($country);
        $query = $country;
        $url = self::API_URL . 'search?geoLocation=' . $country. '&isHighlight=true&medium='. $category.'&q='. $query;

        $response = $client->request(
            'GET',
            $url
        );

        if($response->getStatusCode() === Response::HTTP_OK) {
            $apiArtworks = $response->toArray()['objectIDs'];

            if(!empty($apiArtworks) && count($apiArtworks) >= self::MAX_ARTWORK) {
                $randowKeys = array_rand($apiArtworks, self::MAX_ARTWORK);

                foreach ($randowKeys as $key) {
                    $artworkApiId = $apiArtworks[$key];
                    $artworks[] = $this->findArtwork($artworkApiId);
                }
            }
        }


        return $artworks ?? [];
    }

    public function findArtwork(int $id) :Artwork
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL . 'objects/' . $id);

        $apiArtwork = $response->toArray();

        return new Artwork($apiArtwork);
    }


}
