<?php

namespace App\Entity;

use App\Repository\BasketProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BasketProductRepository::class)]
class BasketProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Basket::class, inversedBy: 'basketProducts')]
    private $basket;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'basketProducts')]
    private $product;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'datetime_immutable')]
    private $added_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasket(): ?Basket
    {
        return $this->basket;
    }

    public function setBasket(?Basket $basket): self
    {
        $this->basket = $basket;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAddedAt(): ?\DateTimeImmutable
    {
        return $this->added_at;
    }

    public function setAddedAt(\DateTimeImmutable $added_at): self
    {
        $this->added_at = $added_at;

        return $this;
    }
}
