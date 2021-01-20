<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $game_category;

    /**
     * @ORM\Column(type="integer")
     */
    private $game_age_range;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $update_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $game_author;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_like;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_dislike;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGameCategory(): ?string
    {
        return $this->game_category;
    }

    public function setGameCategory(string $game_category): self
    {
        $this->game_category = $game_category;

        return $this;
    }

    public function getGameAgeRange(): ?int
    {
        return $this->game_age_range;
    }

    public function setGameAgeRange(int $game_age_range): self
    {
        $this->game_age_range = $game_age_range;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->update_date;
    }

    public function setUpdateDate(?\DateTimeInterface $update_date): self
    {
        $this->update_date = $update_date;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getGameAuthor(): ?string
    {
        return $this->game_author;
    }

    public function setGameAuthor(string $game_author): self
    {
        $this->game_author = $game_author;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getNbLike(): ?int
    {
        return $this->nb_like;
    }

    public function setNbLike(?int $nb_like): self
    {
        $this->nb_like = $nb_like;

        return $this;
    }

    public function getNbDislike(): ?int
    {
        return $this->nb_dislike;
    }

    public function setNbDislike(?int $nb_dislike): self
    {
        $this->nb_dislike = $nb_dislike;

        return $this;
    }
}
