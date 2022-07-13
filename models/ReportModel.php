<?php

namespace app\models;

use app\core\DBModel;

class ReportModel extends DBModel
{
    public $date_from_customers;
    public $date_to_customers;
    public $date_from_orders;
    public $date_to_orders;
    public $orders_show_by;
    public $customers_show_by;
    public $date_from_revenue;
    public $date_to_revenue;
    public $revenue_show_by;


    public function numberOfCustomers(ReportModel $model)
    {
        if ($model->date_from_customers == '' || $model->date_to_customers == '') {
            $sql = "SELECT $model->customers_show_by(u.data_created) as `month`,count(u.id) as number_of_customers from users u
                    INNER JOIN user_roles ur on u.id = ur.id_user
                    INNER JOIN roles r on ur.id_role= r.id
                WHERE u.data_created BETWEEN (NOW() - INTERVAL 5 YEAR) AND NOW() AND r.name='user' group by $model->customers_show_by(u.data_created);";
        } else {


            $sql = "SELECT YEAR(u.data_created) as `month`,count(u.id) as number_of_customers from users u
                    INNER JOIN user_roles ur on u.id = ur.id_user
                    INNER JOIN roles r on ur.id_role= r.id
                WHERE u.data_created BETWEEN '$model->date_from_customers'  AND '$model->date_to_customers' AND r.name='user' group by YEAR(u.data_created);";

        }


        $db_result = $this->db->mysql->query($sql) or die;

        $result_list = [];

        while ($result = $db_result->fetch_assoc()) {
            array_push($result_list, $result);
        }
        return $result_list;
    }

    public function numberOfOrders(ReportModel $model)
    {
        if ($model->date_from_orders == '' || $model->date_to_orders == '') {
            $sql = "SELECT $model->orders_show_by(data_created) as `month`,count(id) as number_of_orders from orders

                WHERE data_created BETWEEN (NOW() - INTERVAL 5 YEAR) AND NOW() group by $model->orders_show_by(data_created);";
        } else {


            $sql = "SELECT $model->orders_show_by(data_created) as `month`,count(id) as number_of_customers from orders
                WHERE data_created BETWEEN '$model->date_from_orders'  AND '$model->date_to_orders' group by $model->orders_show_by(data_created);";

        }


        $db_result = $this->db->mysql->query($sql) or die;

        $result_list = [];

        while ($result = $db_result->fetch_assoc()) {
            array_push($result_list, $result);
        }
        return $result_list;
    }

    public function categoryOrderCount()
    {
        $sql = "SELECT SUM(po.quantity) as quantity, c.category_name as category  from orders o
                    INNER JOIN products_order po on o.id = po.id_product
                    INNER JOIN products p on po.id_product = p.id
                    INNER JOIN category c on p.category = c.id group by c.category_name;";

        $db_result = $this->db->mysql->query($sql) or die;

        $result_list = [];

        while ($result = $db_result->fetch_assoc()) {
            array_push($result_list, $result);
        }
        return $result_list;

    }

    public function topSelling()
    {

        $sql = "SELECT SUM(po.quantity) as amount, p.product_name as product_name  from orders o
                    INNER JOIN products_order po on o.id = po.id_product
                    INNER JOIN products p on po.id_product = p.id GROUP BY p.product_name ORDER BY amount DESC LIMIT 5;";

        $db_result = $this->db->mysql->query($sql) or die;

        $result_list = [];

        while ($result = $db_result->fetch_assoc()) {
            array_push($result_list, $result);
        }
        return $result_list;

    }

    public function revenueReport(ReportModel $model)
    {
        if ($model->date_from_revenue == '' || $model->date_to_revenue == '') {
            $sql = "SELECT SUM(total_price) as revenue, $model->revenue_show_by(data_created) as dt  from orders WHERE data_created BETWEEN (NOW() - INTERVAL 5 YEAR) AND NOW() GROUP BY $model->revenue_show_by(data_created);";

        } else {
            $sql = "SELECT SUM(total_price) as revenue, YEAR(data_created) as dt  from orders WHERE data_created BETWEEN '$model->date_from_revenue' AND '$model->date_to_revenue' GROUP BY YEAR(data_created);";


        }

        $db_result = $this->db->mysql->query($sql) or die;
        $result_list = [];


        while ($result = $db_result->fetch_assoc()) {
            array_push($result_list, $result);
        }

        return $result_list;

    }


    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return '';
    }

    public function attributes(): array
    {
        return [];
    }
}