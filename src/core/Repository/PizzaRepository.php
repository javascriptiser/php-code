<?php

namespace Amasty\core\Repository;

use Amasty\core\DTO\PizzaDTO;
use Amasty\core\DTO\SelectDTO;
use mysqli;

class PizzaRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function getAllPizzas(): array
    {
        $query = "SELECT * FROM pizzas";
        $result = $this->conn->query($query);

        $pizzas = [];

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];

            $pizza = new SelectDTO($id, $name);
            $pizzas[] = $pizza;
        }

        return $pizzas;
    }
}