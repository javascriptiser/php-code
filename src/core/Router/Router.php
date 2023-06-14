<?php
declare(strict_types=1);

namespace Amasty\core\Router;

use Amasty\core\Models\Ingredients\Sauce;
use Amasty\core\Models\Ingredients\Size;
use Amasty\core\Models\Products\Pizza;
use Amasty\core\Repository\PizzaRepository;
use Amasty\core\Repository\PizzaSaucesRepository;
use Amasty\core\Repository\PizzaSizesRepository;
use Amasty\helpers\NB_RB;
use mysqli;

class Router implements IRouter
{
    public static function start(string $uri, mysqli $conn)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");

        switch ($uri) {
            case '/api/select/init/' :
            {
                $pizza_repository = new PizzaRepository($conn);
                $pizzasDTO = $pizza_repository->findMany();

                $sizes_repository = new PizzaSizesRepository($conn);
                $sizesDTO = $sizes_repository->findMany();

                $sauces_repository = new PizzaSaucesRepository($conn);
                $saucesDTO = $sauces_repository->findMany();

                $data = [
                    'pizzas' => $pizzasDTO,
                    'sizes' => $sizesDTO,
                    'sauces' => $saucesDTO,
                ];

                return json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            case '/api/select/order/' :
            {
                $pizza_id = (int)$_POST['pizza'];
                settype($pizza_id, 'integer');

                $size_id = (int)$_POST['sizes'];
                settype($size_id, 'integer');

                $sauce_id = (int)$_POST['sauces'];
                settype($sauce_id, 'integer');

                $sauce_dto = (new PizzaSaucesRepository($conn))->findOneById($sauce_id);
                $sauce = new Sauce($sauce_dto->id, $sauce_dto->name, $sauce_dto->price);

                $size_dto = (new PizzaSizesRepository($conn))->findOneById($size_id);
                $size = new Size($size_dto->id, $size_dto->name, $size_dto->price);

                $pizza_dto = (new PizzaRepository($conn))->findOneById($pizza_id);
                $pizza = new Pizza($pizza_dto->id, $pizza_dto->name, $pizza_dto->price, [$size, $sauce]);

                return json_encode(['pizza' => $pizza, 'usd_rate' => NB_RB::getRate()], JSON_UNESCAPED_UNICODE);
            }
            default:
                header("HTTP/1.1 404 Not Found");
                exit();
        }
    }

}