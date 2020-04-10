<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\EncoderAwareInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, EncoderAwareInterface
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $bnb_balance;

    /**
     * @ORM\Column(type="string", length=9, nullable=true)
     */
    private $user_memo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $register_date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Withdrawal", mappedBy="iduser")
     */
    private $withdrawals;

    public function __construct()
    {
        $this->withdrawals = new ArrayCollection();
    }

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

    /**
     * @inheritDoc
     */
    public function getEncoderName()
    {
		return null;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Withdrawal[]
     */
    public function getWithdrawals(): Collection
    {
        return $this->withdrawals;
    }

    public function addWithdrawal(Withdrawal $withdrawal): self
    {
        if (!$this->withdrawals->contains($withdrawal)) {
            $this->withdrawals[] = $withdrawal;
            $withdrawal->setIduser($this);
        }

        return $this;
    }

    public function removeWithdrawal(Withdrawal $withdrawal): self
    {
        if ($this->withdrawals->contains($withdrawal)) {
            $this->withdrawals->removeElement($withdrawal);
            // set the owning side to null (unless already changed)
            if ($withdrawal->getIduser() === $this) {
                $withdrawal->setIduser(null);
            }
        }

        return $this;
    }
}
