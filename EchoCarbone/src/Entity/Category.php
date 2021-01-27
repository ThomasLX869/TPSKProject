<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $label;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, mappedBy="category")
     */
    private $articles;

    /**
     * @ORM\ManyToMany(targetEntity=Video::class, mappedBy="category")
     */
    private $videos;

    /**
     * @ORM\ManyToMany(targetEntity=Quizz::class, mappedBy="category")
     */
    private $quizzs;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, mappedBy="category")
     */
    private $games;

    /**
     * @ORM\ManyToMany(targetEntity=Glossary::class, mappedBy="category")
     */
    private $glossaries;

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="categories")
     * @ORM\JoinColumn
     */
    private $author;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->quizzs = new ArrayCollection();
        $this->games = new ArrayCollection();
        $this->glossaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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
            $article->addCategory($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            $article->removeCategory($this);
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
            $video->addCategory($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            $video->removeCategory($this);
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
            $quizz->addCategory($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->removeElement($quizz)) {
            $quizz->removeCategory($this);
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
            $game->addCategory($this);
        }

        return $this;
    }

    public function removeGame(Game $game): self
    {
        if ($this->games->removeElement($game)) {
            $game->removeCategory($this);
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
            $glossary->addCategory($this);
        }

        return $this;
    }

    public function removeGlossary(Glossary $glossary): self
    {
        if ($this->glossaries->removeElement($glossary)) {
            $glossary->removeCategory($this);
        }

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
