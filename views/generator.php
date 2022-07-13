<?php
$imena = ["David", "Milos", "Filip", "Djordje", "Marko", "Jovan", "Nikola", "Dragan", "Tanja", "Ana", "Katarina", "Sofija"];
$prezimena = ["Markovic", "Djokic", "Milosevic", "Jovanovic", "Filipovic", "Nemanjic", "Petrovic", "Djordjevic", "Jankovic"];

$values_users = [];
$values_roles = [];
$values_orders=[];
$values_orders_products = [];
for ($i = 0; $i < 100; $i++) {
    $ime = $imena[rand(0, count($prezimena) - 1)] . " " . $prezimena[rand(0, count($prezimena) - 1)];
    $username = "user" . $i;
    $email = "email" . $i . "@xyz.com";
    $pw = '$2y$10$xqq0v4zUzybm6Nt0ZKzobuZUYpqQIYXfZ9Eg.BNhG5VWru37e.9aC';
    $adresa = "adresa" . $i;

    $start = strtotime('2015-01-01');
    $end = time();
    $timestamp = mt_rand($start, $end);

    $date = date('Y-m-d h:i:s', $timestamp);

    $values_users[] = "('$ime' ,  '$username'  ,  '$email' ,  '$pw' , '$adresa','$date','$date',1,1,1)";
}

$values_users = implode(",\n", $values_users);

$sql_users = "INSERT INTO users(full_name,username,email,password,address,data_created,data_updated,user_created,user_updated,active) VALUES $values_users";
echo $sql_users;

echo "<br/>";
echo "<br/>";
echo "-------------------------------------------------------------------------ROLES-------------------------------------------------------------------------";
echo "<br/>";
echo "<br/>";

for ($i = 5; $i < 106; $i++) {
    $date = date('Y-m-d h:i:s');
    $values_roles[] = "('$i' ,  2  ,  ' $date' ,  ' $date' , ' $date','$date','1',1,1)";

}

$values_roles = implode(",\n", $values_roles);


$sql_roles = "INSERT INTO user_roles(id_user,id_role,valid_from,valid_to,data_created,data_updated,user_created,user_updated,active) VALUES $values_roles";
echo $sql_roles;

echo"<br/>";
echo"<br/>";
echo "/*-------------------------------------------------------------------------ORDERS-------------------------------------------------------------------------*/";
echo"<br/>";
echo"<br/>";

for($i=0;$i<200;$i++){

    $start = strtotime('2015-01-01');
    $end = time();
    $timestamp = mt_rand($start, $end);

    $date = date('Y-m-d h:i:s', $timestamp);


    $id = rand(5,100);
    $total = rand(200,7000);
    $values_orders[] = "('$id' ,'$date' ,1, $total ,1)";

}

$values_orders = implode(",\n",$values_orders);
$sql_orders = "INSERT INTO orders(id_user,data_created,sent,total_price,active) VALUES $values_orders;";

echo $sql_orders;

echo"<br/>";
echo"<br/>";
echo "/*-------------------------------------------------------------------------ORDER-PRODUCTS-------------------------------------------------------------------------*/";
echo"<br/>";
echo"<br/>";

for($i=0;$i<200;$i++){

    $start = strtotime('2015-01-01');
    $end = time();
    $timestamp = mt_rand($start, $end);

    $date = date('Y-m-d h:i:s', $timestamp);

    $id_order = rand(1,100);
    $id_product= rand(1,11);
    $quantity = rand(200,5000);
    $values_orders_products[] = "($id_order,$id_product ,$quantity, '$date' ,1)";

}

$values_orders_products = implode(",\n",$values_orders_products);
$sql_order_products = "INSERT INTO products_order( id_order,id_product,quantity,data_created,active) VALUES $values_orders_products;";

echo $sql_order_products;





?>