<?php

use \Core\Route;

return [
    new Route('/hello/', 'hello', 'index'), // роут для приветственной страницы, можно удалить
    new Route('/users/', 'users', 'findAll'),
    new Route('/users/first/:limit', 'users', 'findAllByLimit'),
    new Route('/users/:id/', 'users', 'showById'),
    new Route('/users/:id/:key', 'users', 'infoOneUserByKey'),
];
	
