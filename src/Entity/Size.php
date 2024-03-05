<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SizeRepository::class)]
class Size
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $size_name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $price_change = null;

    #[ORM\OneToOne(mappedBy: 'size_id', cascade: ['persist', 'remove'])]
    private ?Order $order_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getSizeName(): ?string
    {
        return $this->size_name;
    }

    public function setSizeName(string $size_name): static
    {
        $this->size_name = $size_name;

        return $this;
    }

    public function getPriceChange(): ?string
    {
        return $this->price_change;
    }

    public function setPriceChange(string $price_change): static
    {
        $this->price_change = $price_change;

        return $this;
    }

    public function getOrderId(): ?Order
    {
        return $this->order_id;
    }

    public function setOrderId(Order $order_id): static
    {
        // set the owning side of the relation if necessary
        if ($order_id->getSizeId() !== $this) {
            $order_id->setSizeId($this);
        }

        $this->order_id = $order_id;

        return $this;
    }
}
