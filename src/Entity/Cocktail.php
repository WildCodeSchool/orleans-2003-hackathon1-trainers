<?php


namespace App\Entity;


class Cocktail
{
    private $id;
    private $name;
    private $alcoholic;
    private $glass;
    private $instructions;
    private $image;
    private $ingredients;

    public function __construct(?array $data)
    {
        if(!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate (array $data) :void
    {
        $this->setId($data['idDrink']);
        $this->setName($data['strDrink']);
        $this->setAlcoholic($data['strAlcoholic']);
        $this->setGlass($data['strGlass']);
        $this->setInstructions($data['strInstructions']);
        $this->setImage($data['strDrinkThumb']);
        for($i=0;$i<15;$i++) {
            if(!empty($data['strIngredient'.$i])) {
                $ingredients[] = ['name'=>$data['strIngredient'.$i], 'quantity'=>$data['strMeasure'.$i]];
            }
        }
        $this->setIngredients($ingredients ?? []);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAlcoholic()
    {
        return $this->alcoholic;
    }

    /**
     * @param mixed $alcoholic
     */
    public function setAlcoholic($alcoholic): void
    {
        $this->alcoholic = $alcoholic;
    }

    /**
     * @return mixed
     */
    public function getGlass()
    {
        return $this->glass;
    }

    /**
     * @param mixed $glass
     */
    public function setGlass($glass): void
    {
        $this->glass = $glass;
    }

    /**
     * @return mixed
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * @param mixed $instructions
     */
    public function setInstructions($instructions): void
    {
        $this->instructions = $instructions;
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

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients): void
    {
        $this->ingredients = $ingredients;
    }


}
