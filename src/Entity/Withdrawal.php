<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WithdrawalRepository")
 */
class Withdrawal
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="withdrawals")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $asset;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=43)
     */
    private $toAddr;

    /**
     * @ORM\Column(type="boolean")
     */
    private $executed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getuser(): ?User
    {
        return $this->user;
    }

    public function setuser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAsset(): ?string
    {
        return $this->asset;
    }

    public function setAsset(string $asset): self
    {
        $this->asset = $asset;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getToAddr(): ?string
    {
        return $this->toAddr;
    }

    public function setToAddr(string $toAddr): self
    {
        $this->toAddr = $toAddr;

        return $this;
    }

    public function getExecuted(): ?bool
    {
        return $this->executed;
    }

    public function setExecuted(bool $executed): self
    {
        $this->executed = $executed;

        return $this;
    }
}
