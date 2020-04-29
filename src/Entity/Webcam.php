<?php


namespace App\Entity;

class Webcam
{
    private $id;
    private $url;

    public function hydrate (array $data) :void
    {
        $this->setId($data['id']);
        $this->setUrl($data['url']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $id
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

}