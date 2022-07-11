<?php

namespace app\models;

use app\core\DBModel;

class CategoryModel extends DBModel
{
    public $category_name;
    public $description;


    public function rules(): array
    {
        return [
            "category_name" => [self::RULE_REQUIRED]

        ];
    }

    public function tableName()
    {
        return "category";
    }

    public function attributes(): array
    {
        return ["category_name", "active","description"];

    }
    public function createCategory(CategoryModel $model){
        $model->create();

    }




}