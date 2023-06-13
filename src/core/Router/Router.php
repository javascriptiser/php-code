<?php

namespace Amasty\core\Router;

use Amasty\core\Models\Pizza;
use Amasty\core\Models\Sauce;
use Amasty\core\Models\Size;
use Amasty\core\Repository\PizzaRepository;
use Amasty\core\Repository\PizzaSaucesRepository;
use Amasty\core\Repository\PizzaSizesRepository;
use mysqli;

class Router implements IRouter
{
    public static function start(string $uri, mysqli $conn)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");

        switch ($uri) {
            case '':
            case '/api/select/init/' :
            {

                $pizza_repository = new PizzaRepository($conn);
                $pizzasDTO = $pizza_repository->getAllPizzas();

                $sizes_repository = new PizzaSizesRepository($conn);
                $sizesDTO = $sizes_repository->getAllPizzaSizes();

                $sauces_repository = new PizzaSaucesRepository($conn);
                $saucesDTO = $sauces_repository->getAllPizzaSauces();

                $data = [
                    'pizzas' => $pizzasDTO,
                    'sizes' => $sizesDTO,
                    'sauces' => $saucesDTO,
                ];

                return json_encode($data);
            }
            case '/api/select/order/' :
            {
                $pizza_id = (int)$_POST['pizza'];
                $size_id = (int)$_POST['sizes'];
                $sauce_id = (int)$_POST['sauces'];

                $query = "SELECT * FROM pizza_sauces WHERE id = $sauce_id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $sauce = new Sauce((int)$row['id'], $row['name'], (float)$row['additional_price']);

                $query = "SELECT * FROM pizza_sizes WHERE id = $size_id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $size = new Size((int)$row['id'], $row['size'], (float)$row['additional_price']);

                $query = "SELECT * FROM pizzas WHERE id = $pizza_id";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $pizza = new Pizza((int)$row['id'], $row['name'], (float)$row['base_price'], [$sauce]);
                $pizza->addIngredient($size);


                return json_encode($pizza);


            }
            default:
                header("HTTP/1.1 404 Not Found");
                exit();
        }
    }

}