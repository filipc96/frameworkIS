<?php

namespace app\models;

use app\core\DBModel;

class ProductManagmentModel extends DBModel
{
    public $product_name;
    public $price;
    public $quantity;
    public $description;
    public $img_path="";
    public $category;

    public function rules(): array
    {
        return [
            "product_name" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "category" => [self::RULE_REQUIRED]
        ];

    }

    public function tableName()
    {
        return "products";
    }

    public function attributes(): array
    {
        return [
            "product_name",
            "price",
            "quantity",
            "description",
            "category",
            "img_path",
            "data_created",
            "data_updated",
            "user_created",
            "user_updated",
            "active"
        ];
    }

    public function attributesForUpdate(): array
    {
        return [
            "product_name",
            "price",
            "quantity",
            "description",
            "category",
            "img_path",
            "data_updated",
            "user_updated",
            "active"
        ];
    }

    public function createProduct(ProductManagmentModel $model){
        $model->create();
    }

    public function editProduct(ProductManagmentModel $model)
    {

        $idToUpdate = $model->id;
        $model->update("id=$idToUpdate");
    }

    public function deactivateProduct(ProductManagmentModel $model){
        $idToUpdate = $model->id;
        $model->deactivate("id=$idToUpdate");
    }

}