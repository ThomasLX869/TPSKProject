<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(
 *  fields ={"email"},
 *  message="Adresse email déjà utilisée, merci d'en utiliser une autre"
 * )
 */
class Admin implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide.",
     * )
     *
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Assert\NotBlank
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les deux mots de passe doivent être identiques")
     */
    private $passwordConfirm;

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

    /**
     * Génére un slug automatiquement
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @return void
     */
    public function initSlug(){
        if(empty($this->slug) ){
            $slugify = new Slugify();
            $this->slug = $slugify->slugify($this->getFirstname().time().hash("sha1", $this->getLastname()) );
        }
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;


        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
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

    public function getPasswordConfirm(): ?string
    {
        return $this->passwordConfirm;
    }

    public function setPasswordConfirm(string $passwordConfirm): self
    {
        $this->passwordConfirm = $passwordConfirm;

        return $this;
    }
}
