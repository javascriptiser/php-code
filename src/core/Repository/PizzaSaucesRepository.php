<?php
declare(strict_types=1);

namespace Amasty\core\Repository;

use Amasty\core\DTO\SauceDTO;
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
    public function findMany(): array
    {
        $query = "SELECT * FROM pizza_sauces";
        $result = $this->conn->query($query);
        $sauces = [];

        while ($row = $result->fetch_assoc()) {
            $sauces[] = new SauceDTO((int)$row['id'], $row['name'], (float)$row['additional_price']);
        }

        return $sauces;
    }

    public function findOneById(int $id): SauceDTO
    {
        $query = "SELECT * FROM pizza_sauces WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return new SauceDTO((int)$row['id'], $row['name'], (float)$row['additional_price']);
    }
}