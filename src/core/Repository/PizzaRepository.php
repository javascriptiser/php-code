<?php
declare(strict_types=1);

namespace Amasty\core\Repository;

use Amasty\core\DTO\PizzaDTO;
use mysqli;

class PizzaRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return PizzaDTO[]
     */
    public function findMany(): array
    {
        $query = "SELECT * FROM pizzas";
        $result = $this->conn->query($query);
        $pizzas = [];

        while ($row = $result->fetch_assoc()) {
            $pizza = new PizzaDTO((int)$row['id'], $row['name'], (float)$row['base_price']);
            $pizzas[] = $pizza;
        }

        return $pizzas;
    }

    public function findOneById(int $id): PizzaDTO
    {
        $query = "SELECT * FROM pizzas WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return new PizzaDTO((int)$row['id'], $row['name'], (float)$row['base_price']);
    }

}