<?php
declare(strict_types=1);

namespace Amasty\core\Models\Ingredients;

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