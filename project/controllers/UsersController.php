<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\User;

class UsersController extends Controller
{
    public $title;
    private $user;

    public function __construct()
    {
        $this->title = "User title";
        $this->user = new User();
    }

    public function findAll()
    {
        $users = $this->user->findAll();
        return $this->render('users/user_table', ['users' => $users ?? null]);
    }

    public function findAllByLimit($params)
    {
        $limit = (int)$params['limit'];
        $users = $this->user->findAll($limit);
        return $this->render('users/user_table', ['users' => $users ?? null]);
    }

    public function showById($params)
    {
        $id = (int)$params['id'];
        $user = $this->user->findOneById($id);

        return $this->render('users/user_table', ['users' => [$user] ?? null]);
    }

    public function infoOneUserByKey($params)
    {
        $id = (int)$params['id'];
        $params_key = $params['key'];

        $user = $this->user->findOneById($id);

        return $this->render('users/user_table', [
            'users' => null,
            'user_prop' => $user[$params_key]
        ]);
    }
}