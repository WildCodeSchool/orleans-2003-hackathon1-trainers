<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos/1');

        $content = $response->toArray();
        dump($content);
// $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $this->render('home/index.html.twig', [
            'content' => $content,
        ]);
    }
}

