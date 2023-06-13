<?php

namespace Amasty\core\Models;

use JsonSerializable;

class Pizza extends Product implements JsonSerializable
{
    /**
     * @param int $id
     * @param string $name
     * @param float $base_price
     * @param Ingredient[] $ingredients
     */
    public function __construct(int $id, string $name, float $base_price, array $ingredients)
    {
        parent::__construct($id, $name, $base_price, $ingredients);
    }

}