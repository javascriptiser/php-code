<?php

namespace Project\Models;

use Core\Model;

class User extends Model
{
    public function findOneById($id)
    {
        $query = "SELECT * FROM users WHERE id=$id";
        return parent::findOne($query);
    }

    public function findAll($limit = 5)
    {
        $query = "SELECT * FROM users LIMIT $limit";
        return parent::findMany($query);
    }

}