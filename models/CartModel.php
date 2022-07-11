<?php

namespace app\models;

class CartModel extends DBModel
{
    public $productIdList = [];
    public $userID;

    public function rules(): array
    {
        return [];
    }
}