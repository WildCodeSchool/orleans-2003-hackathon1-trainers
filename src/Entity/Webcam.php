<?php


namespace App\Entity;

class Webcam
{
    private $id;
    private $country;
    private $image;
    private $place;

    public function __construct(?array $data)
    {
        if(!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate (array $data) :void
    {
        dump($data);
        $this->setId($data['id']);
        $this->setImage($data['image']['current']['preview']);
        $this->setCountry($data['location']['country']);
        $this->setPlace($data['location']['city']);
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place): void
    {
        $this->place = $place;
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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

}
