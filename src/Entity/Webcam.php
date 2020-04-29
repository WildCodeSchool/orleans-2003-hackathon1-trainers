<?php


namespace App\Entity;

class Webcam
{
    private $id;

    private $country;

    public function __construct(?array $data)
    {
        if(!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate (array $data) :void
    {
        $this->setId($data['webcamid']);
        $this->setCountry($data['country']);
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

}