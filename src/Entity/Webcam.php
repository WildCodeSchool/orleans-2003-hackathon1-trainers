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
     * @return mixed $webcamId
     */
    public function getWebcamId($webcamId) :void
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