<?php


namespace App\Repository;


use App\Entity\Artwork;
use App\Entity\Cocktail;
use App\Entity\Webcam;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class WebcamRepository
{
    const API_URL =  'https://api.windy.com/api/webcams/v2/';

    private $parameterBag;

    // récupération du parameter définit dans le fichier services.yaml
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function findWebcamByCountry(string $country) : Webcam
    {
        // $key = $this->parameterBag->get('apiWindyKey');
        // dump($key);
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL . 'list/country=' . $country . '/category=beach/limit=1' . "?key=J7uQJxRHEJzVY9ZZoTavrkX4ZGPnmnpw");

        if($response->getStatusCode() === Response::HTTP_OK) {
            $apiWebcam = $response->toArray();
            $webcam = new Webcam($apiWebcam);
        }

        return $webcam;
    }

    public function findWebcam(int $id) :Webcam
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL . 'list/webcam=' . $id . "?key=J7uQJxRHEJzVY9ZZoTavrkX4ZGPnmnpw");

        $apiWebcam = $response->toArray();

        return new Webcam($apiWebcam);
    }
}
