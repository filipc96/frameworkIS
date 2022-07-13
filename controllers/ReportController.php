<?php

namespace app\controllers;

use app\core\Controller;
use app\models\ReportModel;

class ReportController extends Controller
{
    public function numberOfCustomers(){
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->numberOfCustomers($model));exit();
    }

    public function numberOfOrders(){
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->numberOfOrders($model));exit();
    }

    public function categoryOrderCount(){
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->categoryOrderCount($model));exit();
    }

    public function topSelling(){
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->topSelling($model));exit();
    }

    public function revenueReport(){
        $model = new ReportModel();
        $model->loadData($this->request->getAll());

        echo json_encode($model->revenueReport($model));exit();

    }

    public function authorize(): array
    {
        return ['admin','editor'];
    }
}