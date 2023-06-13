<?php

namespace Amasty\core\DTO;

class SauceDTO extends DTO
{
    public int $id;
    public string $name;
    public float $price;

    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function jsonSerialize(): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
        ];
    }
}