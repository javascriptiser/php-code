<?php
declare(strict_types=1);

namespace Amasty\core\Repository;

use Amasty\core\DTO\SizeDTO;
use mysqli;

class PizzaSizesRepository extends Repository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return SizeDTO[]
     */
    public function findMany(): array
    {
        $query = "SELECT * FROM pizza_sizes";
        $result = $this->conn->query($query);
        $sizes = [];

        while ($row = $result->fetch_assoc()) {
            $sizeDTO = new SizeDTO((int)$row['id'], (int)$row['size'], (float)$row['additional_price']);
            $sizes[] = $sizeDTO;
        }

        return $sizes;
    }

    public function findOneById(int $id): SizeDTO
    {
        $query = "SELECT * FROM pizza_sizes WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return new SizeDTO((int)$row['id'], (int)$row['size'], (float)$row['additional_price']);
    }

}