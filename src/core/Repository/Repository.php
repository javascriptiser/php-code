<?php
declare(strict_types=1);

namespace Amasty\core\Repository;

use Amasty\core\DTO\DTO;

abstract class Repository
{
    abstract public function findOneById(int $id): DTO;

    /**
     * @return DTO[]
     */
    abstract public function findMany(): array;
}