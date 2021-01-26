<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\GlossaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GlossaryRepository::class)
 */
class Glossary
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
     *      min = 4,
     *      max = 255,
     *      minMessage = "Pour ce titre il faut au moins {{ limit }} caractères",
     *      maxMessage = "Max {{ limit }} caractères",
     *      allowEmptyString = false
     * )
     */
    private $word;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 10,
     *      minMessage = "L'intro doit faire au moins {{ limit }} caractères",
     *      allowEmptyString = false
     * )
     */
    private $definition;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Assert\Length(
     *      max = 1000,
     *      maxMessage = "Max {{ limit }} caractères",
     * )
     */
    private $source;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Assert\Url(message = "Ce n'est pas une url valide",)
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="glossaries")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="glossaries")
     * @ORM\JoinColumn
     */
    private $author;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->word;
    }

    public function setWord(string $word): self
    {
        $this->word = $word;

        return $this;
    }

    public function getDefinition(): ?string
    {
        return $this->definition;
    }

    public function setDefinition(string $definition): self
    {
        $this->definition = $definition;

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

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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
