<?php

namespace Amasty\core\Models;

use JsonSerializable;

abstract class Ingredient implements JsonSerializable
{
    private int $id;
    private float $price;
    private string $name;

    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->price = $price;
        $this->name = $name;
    }


    function getPrice(): float
    {
        return $this->price;
    }

    function getName(): string
    {
        return $this->name;
    }

    function getId(): int
    {
        return $this->id;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}