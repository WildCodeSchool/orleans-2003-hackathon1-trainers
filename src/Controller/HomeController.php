<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
class HomeController extends AbstractController
{
    /**
     * @Route("/home/all", name="home_all")
     */
    public function list(TodoRepository $todoRepository)
    {
        $todos = $todoRepository->findAllTodo();
        return $this->render('home/list.html.twig', [
            'todos' => $todos,
        ]);
    }

    /**
     * @Route("/home/{id}", name="home")
     */
    public function index(int $id, TodoRepository $todoRepository)
    {
        $todo = $todoRepository->findTodo($id);
        dump($todo);
        return $this->render('home/index.html.twig', [
            'todo' => $todo,
        ]);
    }


}

