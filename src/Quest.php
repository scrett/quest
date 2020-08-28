<?php
// сущность таблицы Quest
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="quest")
 */
class Quest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id; //поле идентификатора
    /**
     * @ORM\Column(type="string")
     */
    protected $title; //поле заголовка
    /**
     * @ORM\Column(type="string")
     */
    protected $description; //поле описания задания

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}