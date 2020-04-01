<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="float")
     */
    private $bnb_balance;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $user_memo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $register_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    public function getBnbBalance(): ?float
    {
        return $this->bnb_balance;
    }

    public function setBnbBalance(float $bnb_balance): self
    {
        $this->bnb_balance = $bnb_balance;

        return $this;
    }

    public function getUserMemo(): ?string
    {
        return $this->user_memo;
    }

    public function setUserMemo(string $user_memo): self
    {
        $this->user_memo = $user_memo;

        return $this;
    }

    public function getRegisterDate(): ?\DateTimeInterface
    {
        return $this->register_date;
    }

    public function setRegisterDate(\DateTimeInterface $register_date): self
    {
        $this->register_date = $register_date;

        return $this;
    }
}
