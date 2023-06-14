<?php
declare(strict_types=1);

namespace Amasty\core\Models\Products;

use Amasty\core\Models\Ingredients\Ingredient;
use JsonSerializable;

class Product implements JsonSerializable
{
    protected int $id;

    /**
     * @var Ingredient[]
     */
    protected array $ingredients;
    protected string $name;
    private float $total_price;
    private float $base_price;

    /**
     * @param int $id
     * @param string $name
     * @param float $base_price
     * @param Ingredient[] $ingredients
     */
    public function __construct(int $id, string $name, float $base_price, array $ingredients)
    {
        $this->id = $id;
        $this->name = $name;
        $this->ingredients = $ingredients;
        $this->base_price = $base_price;
        $this->total_price = $this->calculateTotalPrice();

    }

    public function addIngredient(Ingredient $ingredient): Product
    {
        $this->ingredients[] = $ingredient;
        $this->total_price = $this->calculateTotalPrice();
        return $this;
    }

    private function calculateTotalPrice(): float
    {
        $price = $this->base_price;
        foreach ($this->ingredients as $ingredient) {
            if ($ingredient instanceof Ingredient) {
                $price += $ingredient->getPrice();
            }
        }
        return round($price, 2);
    }

    public function getTotalPrice(): float
    {
        return $this->total_price;
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