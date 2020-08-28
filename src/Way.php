<?php
// сущность таблицы Way
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="way")
 */
class Way
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id; //поле идентификатора
    /**
     * @ORM\Column(type="integer")
     */
    protected $actId; //поле идентификатора актуального квеста
    /**
     * @ORM\Column(type="integer")
     */
    protected $nextId; //поле идентификатора следующего квеста
    /**
     * @ORM\Column(type="string")
     */
    protected $description; //поле описания пути
    /**
     * @ORM\Column(type="integer")
     */
    protected $trap; //поле вероятность попадания в ловушку 0-100%
    /**
     * @ORM\Column(type="integer")
     */
    protected $trapId; //поле идентификатора квеста ловушки

    public function getId()
    {
        return $this->id;
    }

    public function getActId()
    {
        return $this->actId;
    }

    public function setActId($actId)
    {
        $this->actId = $actId;
    }
    public function getNextId()
    {
        return $this->nextId;
    }

    public function setNextId($nextId)
    {
        $this->nextId = $nextId;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTrap()
    {
        return $this->trap;
    }

    public function setTrap($trap)
    {
        $this->trap = $trap;
    }

    public function getTrapId()
    {
        return $this->trapId;
    }

    public function setTrapId($trapId)
    {
        $this->trapId = $trapId;
    }

}