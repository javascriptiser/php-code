<?php

namespace Amasty\core\Repository;

use Amasty\core\DTO\PizzaDTO;
use Amasty\core\DTO\SauceDTO;
use Amasty\core\DTO\SelectDTO;
use mysqli;

class PizzaSaucesRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return SauceDTO[]
     */
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

    public function getOneById(int $id): SauceDTO
    {
        $query = "SELECT * FROM pizza_sauces WHERE id = $id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return new SauceDTO((int)$row['id'], $row['name'], (float)$row['additional_price']);
    }
}