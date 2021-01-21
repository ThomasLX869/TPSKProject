<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $presentation;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="author")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="author")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity=Quizz::class, mappedBy="author")
     */
    private $quizzs;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="author")
     */
    private $games;

    /**
     * @ORM\OneToMany(targetEntity=Glossary::class, mappedBy="author")
     */
    private $glossaries;

    /**
     * @ORM\OneToMany(targetEntity=AgeRange::class, mappedBy="author")
     */
    private $ageRanges;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="author")
     */
    private $categories;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->glossaries = new ArrayCollection();
        $this->ageRanges = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setAuthor($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getAuthor() === $this) {
                $article->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setAuthor($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getAuthor() === $this) {
                $video->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Quizz[]
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    public function addQuizz(Quizz $quizz): self
    {
        if (!$this->quizzs->contains($quizz)) {
            $this->quizzs[] = $quizz;
            $quizz->setAuthor($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->removeElement($quizz)) {
            // set the owning side to null (unless already changed)
            if ($quizz->getAuthor() === $this) {
                $quizz->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): self
    {
        if (!$this->games->contains($game)) {
            $this->games[] = $game;
            $game->setAuthor($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getAuthor() === $this) {
                $game->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Glossary[]
     */
    public function getGlossaries(): Collection
    {
        return $this->glossaries;
    }

    public function addGlossary(Glossary $glossary): self
    {
        if (!$this->glossaries->contains($glossary)) {
            $this->glossaries[] = $glossary;
            $glossary->setAuthor($this);
        }

        return $this;
    }

    public function removeGlossary(Glossary $glossary): self
    {
        if ($this->glossaries->removeElement($glossary)) {
            // set the owning side to null (unless already changed)
            if ($glossary->getAuthor() === $this) {
                $glossary->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AgeRange[]
     */
    public function getAgeRanges(): Collection
    {
        return $this->ageRanges;
    }

    public function addAgeRange(AgeRange $ageRange): self
    {
        if (!$this->ageRanges->contains($ageRange)) {
            $this->ageRanges[] = $ageRange;
            $ageRange->setAuthor($this);
        }

        return $this;
    }

    public function removeAgeRange(AgeRange $ageRange): self
    {
        if ($this->ageRanges->removeElement($ageRange)) {
            // set the owning side to null (unless already changed)
            if ($ageRange->getAuthor() === $this) {
                $ageRange->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setAuthor($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getAuthor() === $this) {
                $category->setAuthor(null);
            }
        }

        return $this;
    }
}
