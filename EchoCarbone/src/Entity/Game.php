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
    private $gameCategory;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameAgeRange;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gameAuthor;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbLike;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbDislike;

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->gameCategory;
    }

    public function setGameCategory(string $gameCategory): self
    {
        $this->gameCategory = $gameCategory;

        return $this;
    }

    public function getGameAgeRange(): ?int
    {
        return $this->gameAgeRange;
    }

    public function setGameAgeRange(int $gameAgeRange): self
    {
        $this->gameAgeRange = $gameAgeRange;

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
        return $this->updateDate;
    }

    public function setUpdateDate(?\DateTimeInterface $updateDate): self
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getGameAuthor(): ?string
    {
        return $this->gameAuthor;
    }

    public function setGameAuthor(string $gameAuthor): self
    {
        $this->gameAuthor = $gameAuthor;

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
        return $this->nbLike;
    }

    public function setNbLike(?int $nbLike): self
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    public function getNbDislike(): ?int
    {
        return $this->nbDislike;
    }

    public function setNbDislike(?int $nbDislike): self
    {
        $this->nbDislike = $nbDislike;

        return $this;
    }
}
