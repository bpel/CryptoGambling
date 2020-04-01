<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TxRepository")
 */
class Tx
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $txHash;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $blockHeight;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $txType;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\Column(type="string", length=43)
     */
    private $fromAddr;

    /**
     * @ORM\Column(type="string", length=43)
     */
    private $toAddr;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $txAsset;

    /**
     * @ORM\Column(type="float")
     */
    private $txFee;

    /**
     * @ORM\Column(type="integer")
     */
    private $txAge;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $memo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTxHash(): ?string
    {
        return $this->txHash;
    }

    public function setTxHash(string $txHash): self
    {
        $this->txHash = $txHash;

        return $this;
    }

    public function getBlockHeight(): ?string
    {
        return $this->blockHeight;
    }

    public function setBlockHeight(string $blockHeight): self
    {
        $this->blockHeight = $blockHeight;

        return $this;
    }

    public function getTxType(): ?string
    {
        return $this->txType;
    }

    public function setTxType(string $txType): self
    {
        $this->txType = $txType;

        return $this;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getFromAddr(): ?string
    {
        return $this->fromAddr;
    }

    public function setFromAddr(string $fromAddr): self
    {
        $this->fromAddr = $fromAddr;

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

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getTxAsset(): ?string
    {
        return $this->txAsset;
    }

    public function setTxAsset(string $txAsset): self
    {
        $this->txAsset = $txAsset;

        return $this;
    }

    public function getTxFee(): ?float
    {
        return $this->txFee;
    }

    public function setTxFee(float $txFee): self
    {
        $this->txFee = $txFee;

        return $this;
    }

    public function getTxAge(): ?int
    {
        return $this->txAge;
    }

    public function setTxAge(int $txAge): self
    {
        $this->txAge = $txAge;

        return $this;
    }

    public function getMemo(): ?string
    {
        return $this->memo;
    }

    public function setMemo(string $memo): self
    {
        $this->memo = $memo;

        return $this;
    }
}
