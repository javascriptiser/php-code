<?php

namespace Amasty\core\Models\Ingredients;

class Size extends Ingredient
{
    public function __construct(int $id, int $name, float $price)
    {
        parent::__construct($id, (string)$name, $price);
    }

    public function jsonSerialize(): array
    {
        return ['size' => [
            parent::jsonSerialize()
        ]];
    }
}