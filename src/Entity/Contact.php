<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Votre nom doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "L'addresse mail '{{ value }}' n'est pas valide."
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 8,
     *      max = 12,
     *      minMessage = "Votre numéro doit avoir au minimum {{ limit }} chiffres",
     *      maxMessage = "Votre numéro doit avoir au maximum {{ limit }} chiffres"
     * )
     * @Assert\Regex(
     *     pattern="/\d/",
     *     message="Merci d'entrer un numéro de téléphone valide"
     * )
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      max = 2000,
     *      minMessage = "Votre message doit avoir au minimum {{ limit }} caractères",
     *      maxMessage = "Votre message doit avoir au maximum {{ limit }} caractères"
     * )
     */
    private $message;

    public function getId()
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
