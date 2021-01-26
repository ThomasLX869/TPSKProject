<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Admin;
use App\Entity\AgeRange;
use App\Entity\Category;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VideoRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 * @ORM\HasLifecycleCallbacks // utilisé pour gérer les dates de création 
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min = 4,
     * max = 255,
     * minMessage = "Pour ce titre il faut au moins {{ limit }} caractères",
     * maxMessage = "Max {{ limit }} caractères",
     * allowEmptyString = false
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Assert\Length(
     * max = 1000,
     * maxMessage = "Max {{ limit }} caractères",)
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\Length(
     * max = 1000,
     * maxMessage = "Max {{ limit }} caractères",)
     * @Assert\Url(message = "Ce n'est pas une url valide",)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Assert\Length(
     * max = 1000,
     * maxMessage = "Max {{ limit }} caractères",)
     * @Assert\Url(message = "Ce n'est pas une url valide",)
     */

    private $image;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Assert\Length(
     * max = 1000,
     * maxMessage = "Max {{ limit }} caractères",)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updateDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     * min = 10,
     * minMessage = "L'intro doit faire au moins {{ limit }} caractères",
     * allowEmptyString = false)
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
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="videos")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=AgeRange::class, inversedBy="videos")
     */

    private $ageRange;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="videos")
     * @ORM\JoinColumn
     */
    private $author;

    // guarantee all video have video type
    private $type = 'video';

    public function updateDate()
    {
        if (empty($this->creationDate)) {
            $this->creationDate = new \DateTime();
        }
    }

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

    public function getType(): ?string
    {
        return $this->type;
    }
}
