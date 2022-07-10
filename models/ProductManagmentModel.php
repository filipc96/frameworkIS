<?php

namespace app\models;

use app\core\DBModel;

class ProductManagmentModel extends DBModel
{
    public $productName;
    public $price;
    public $quantity;
    public $description;
    public array $category = [];

    public function rules(): array
    {
        return [
            "productName" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "quantity" => [self::RULE_REQUIRED],
            "dewscription" => [self::RULE_REQUIRED],
            "category" => [self::RULE_REQUIRED]
        ];

    }

    public function tableName()
    {
        return "";
    }

    public function attributes(): array
    {
        return [];
    }

}