<?php
declare(strict_types=1);

namespace Amasty\core\DTO;

class SizeDTO extends DTO
{
    public int $id;

    public int $name;
    public float $price;

    public function __construct(int $id, int $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
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