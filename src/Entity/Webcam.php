<?php


namespace App\Entity;

class Webcam
{
    private $id;

    public function hydrate (array $data) :void
    {
        $this->setId($data['webcamid']);
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

}