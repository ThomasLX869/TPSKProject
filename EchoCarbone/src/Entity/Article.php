<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $image;


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

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="articles")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=AgeRange::class, inversedBy="articles")
     */
    private $ageRange;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    public function __construct()
    {
        $this->category = new ArrayCollection();
        $this->ageRange = new ArrayCollection();
    }

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

    public function getArticleCategory(): ?string
    {
        return $this->articleCategory;
    }

    public function setArticleCategory(string $articleCategory): self
    {
        $this->articleCategory = $articleCategory;

        return $this;
    }

    public function getArticleAgeRange(): ?string
    {
        return $this->articleAgeRange;
    }

    public function setArticleAgeRange(string $articleAgeRange): self
    {
        $this->articleAgeRange = $articleAgeRange;

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

    public function getArticleAuthor(): ?string
    {
        return $this->articleAuthor;
    }

    public function setArticleAuthor(string $articleAuthor): self
    {
        $this->articleAuthor = $articleAuthor;

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

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|AgeRange[]
     */
    public function getAgeRange(): Collection
    {
        return $this->ageRange;
    }

    public function addAgeRange(AgeRange $ageRange): self
    {
        if (!$this->ageRange->contains($ageRange)) {
            $this->ageRange[] = $ageRange;
        }

        return $this;
    }

    public function removeAgeRange(AgeRange $ageRange): self
    {
        $this->ageRange->removeElement($ageRange);

        return $this;
    }

    public function getAuthor(): ?Admin
    {
        return $this->author;
    }

    public function setAuthor(?Admin $author): self
    {
        $this->author = $author;

        return $this;
    }
}
