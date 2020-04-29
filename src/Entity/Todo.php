<?php


namespace App\Entity;


class Todo
{
    private $userId;

    private $title;

    private $completed;

    public function hydrate(array $todo) :void
    {
        $this->setTitle($todo['title']);
        $this->setCompleted($todo['completed']);
        $this->setUserId($todo['userId']);
    }
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @param mixed $completed
     */
    public function setCompleted($completed): void
    {
        $this->completed = $completed;
    }


}
