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

    public function findWebcamByCountry(string $country) :?Webcam
    {
        $apiWindyKey = $this->parameterBag->get('apiWindyKey');

        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL . 'list/country=' . $country . '/category=beach' . "?show=webcams:location,image&key=" . $apiWindyKey);

        if($response->getStatusCode() === Response::HTTP_OK) {
            $apiWebcams = $response->toArray()['result']['webcams'];
            if(!empty($apiWebcams)) {
                $key = array_rand($apiWebcams);
                $webcam = new Webcam($apiWebcams[$key]);
            }
        }

        return $webcam ?? null;
    }
}
