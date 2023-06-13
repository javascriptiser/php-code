<?php

namespace Amasty\core\Models;

class Sauce extends Ingredient
{
    public function __construct(int $id, string $name, float $price)
    {
        parent::__construct($id, $name, $price);
    }

    public function jsonSerialize(): array
    {
        return ['sauce' => [
            parent::jsonSerialize()
        ]];
    }

}