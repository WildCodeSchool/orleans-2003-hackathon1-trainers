<?php


namespace App\Repository;


use App\Entity\Todo;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\HttpClient;

class TodoRepository
{
    const API_URL =  'https://jsonplaceholder.typicode.com/todos/';

    private $parameterBag;

    // recupération du parameter definit dans le fichier services.yaml
    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function findTodo(int $id) :Todo
    {
       // $key = $this->parameterBag->get('apiWindyKey');
       // dump($key);
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL .$id);

        $todoFromApi = $response->toArray();

        $todo = new Todo();
        $todo->hydrate($todoFromApi);

        return $todo;
    }

    public function findAllTodo() :array
    {
        $client = HttpClient::create();
        $response = $client->request('GET', self::API_URL);

        $todosFromApi = $response->toArray();
        foreach ($todosFromApi as $todoFromApi) {
            $todo = new Todo();
            $todo->hydrate($todoFromApi);
            $todos[] = $todo;
        }

        return $todos;
    }

}
