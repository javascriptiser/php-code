<?php

namespace Amasty\core\Repository;

use Amasty\core\DTO\PizzaDTO;
use Amasty\core\DTO\SelectDTO;
use mysqli;

class PizzaSaucesRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function getAllPizzaSauces(): array
    {
        $query = "SELECT * FROM pizza_sauces";
        $result = $this->conn->query($query);

        $sauces = [];

        while ($row = $result->fetch_assoc()) {
            $key = $row['id'];
            $value = $row['name'];

            $sacuesDTO = new SelectDTO($key, $value);

            $sauces[] = $sacuesDTO;
        }

        return $sauces;
    }
}