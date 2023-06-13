<?php

namespace Amasty\core\Models;

class Size extends Ingredient
{
    public function __construct(int $id, string $name, float $price)
    {
        parent::__construct($id, $name, $price);
    }

}