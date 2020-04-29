<?php


namespace App\Entity;

class Webcam
{
    private $webcamId;

    public function hydrate(array $webcam) :void
    {
        $this->setWebcamId($webcam['webcamId']);
    }

    /**
     * @return mixed
     */
    public function getWebcamId()
    {
        return $this->webcamId;
    }

    /**
     * @param mixed $webcamId
     */
    public function setWebcamId($webcamId): void
    {
        $this->webcamId = $webcamId;
    }

}