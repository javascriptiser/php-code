<?php

namespace Amasty\core\DTO;

use JsonSerializable;

class SelectDTO implements JsonSerializable
{
    private int $key;
    private string $value;

    public function __construct(int $key, string $value)
    {
        $this->key = $key;
        $this->value = $value;
    }


    public function jsonSerialize(): array
    {
        return [
            'key'=>$this->key,
            'value'=>$this->value
        ];
    }
}