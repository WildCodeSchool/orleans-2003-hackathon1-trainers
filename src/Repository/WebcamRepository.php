<?php


namespace App\Repository;


use App\Entity\Webcam;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;

class WebcamRepository
{
    const API_URL =  'https://api.windy.com/api/webcams/v2/';

    private $parameterBag;

    // récupération du parameter définit dans le fichier services.yaml
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function findWebcam(int $id) :Webcam
    {
        // $key = $this->parameterBag->get('apiWindyKey');
        // dump($key);
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL .$id . "?key=J7uQJxRHEJzVY9ZZoTavrkX4ZGPnmnpw");

        $webcamFromApi = $response->toArray();

        $webcam = new Webcam();
        $webcam->hydrate($webcamFromApi);

        return $webcam;
    }

    public function findAllWebcam() :array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL);

        $webcamsFromApi = $response->toArray();
        foreach ($webcamsFromApi as $webcamFromApi) {
            $webcam = new Webcam();
            $webcam->hydrate($webcamFromApi);
            $webcams[] = $webcam;
        }

        return $webcams;
    }

}
