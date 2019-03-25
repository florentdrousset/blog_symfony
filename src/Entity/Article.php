<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Article {

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->is_published = false;
    }
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    public function getId() {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $title;
    public function getTitle() {
        return $this->title;
    }

    public function setTitle(string $title) {
        $this->title = $title;
        return $this; //permettra de chaîner les requêtes : article->setTitle->getTitle->etc... grâce au return $this
    }

    /**
     * @ORM\Column(type="text")
     */
    private $content;
    public function getContent() {
        return $this->content;
    }

    public function setContent(string $content) {
        $this->content = $content;
        return $this;
    }

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;
    public function getCreated_at() {
        return $this->created_at;
    }

    public function setCreated_at(string $created_at) {
        $this->created_at = $created_at;
    }

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;
    public function getIs_published() {
        return $this->is_published;
    }

    public function setIs_published($is_published) {
        $this->is_published = $is_published;
    }
}
