<?php
declare(strict_types=1);

namespace Amasty\core\Models\Ingredients;

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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
        ];
    }
}