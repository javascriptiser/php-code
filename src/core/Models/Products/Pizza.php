<?php
declare(strict_types=1);

namespace Amasty\core\Models\Products;

use Amasty\core\Models\Ingredients\Ingredient;

class Pizza extends Product
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ingredients' => $this->ingredients,
            'total_price' => $this->getTotalPrice()
        ];
    }

}