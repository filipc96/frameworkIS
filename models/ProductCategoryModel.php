<?php

namespace app\models;

class ProductCategoryModel extends Model
{
    public $id_product;
    public $id_category;


    public function rules(): array
    {
        return [
//            "productName" => [self::RULE_REQUIRED],
//            "price" => [self::RULE_REQUIRED],
//            "quantity" => [self::RULE_REQUIRED],
//            "category" => [self::RULE_REQUIRED]
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

    public function createProduct(ProductManagmentModel $model){
        $model->create();


    }


}