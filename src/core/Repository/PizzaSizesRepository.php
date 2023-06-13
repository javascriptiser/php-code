<?php

namespace Amasty\core\Repository;

use Amasty\core\DTO\SelectDTO;
use Amasty\core\DTO\SizeDTO;
use mysqli;

class PizzaSizesRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function getAllPizzaSizes(): array
    {
        $query = "SELECT * FROM pizza_sizes";
        $result = $this->conn->query($query);

        $sizes = [];

        while ($row = $result->fetch_assoc()) {
            $key = $row['id'];
            $value = $row['size'];

            $sizeDTO = new SelectDTO($key, $value);

            $sizes[] = $sizeDTO;
        }

        return $sizes;
    }

    public function getOneById(int $id): SizeDTO
    {
        $query = "SELECT * FROM pizza_sizes WHERE id = $id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return new SizeDTO((int)$row['id'], $row['size'], (float)$row['additional_price']);
    }
}