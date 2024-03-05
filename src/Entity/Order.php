<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $total_price = null;

    #[ORM\OneToOne(inversedBy: 'order_id', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?product $product_id = null;

    #[ORM\OneToOne(inversedBy: 'order_id', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?customer $customer_id = null;

    #[ORM\OneToOne(inversedBy: 'order_id', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?size $size_id = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getTotalPrice(): ?string
    {
        return $this->total_price;
    }

    public function setTotalPrice(string $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getProductId(): ?product
    {
        return $this->product_id;
    }

    public function setProductId(product $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getCustomerId(): ?customer
    {
        return $this->customer_id;
    }

    public function setCustomerId(customer $customer_id): static
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getSizeId(): ?size
    {
        return $this->size_id;
    }

    public function setSizeId(size $size_id): static
    {
        $this->size_id = $size_id;

        return $this;
    }



}
