<?php

use app\models\UserModel;

function getUserRows()
{
    $userModel = new UserModel();
    $userModelList = $userModel->getAllUsersWithRoles();

//    echo "<pre>";
//    var_dump($userModelList);
//echo "</pre>";exit();

    foreach ($userModelList as $user) {

        $id = $user[0];
        $full_name = $user[1];
        $username = $user[2];
        $address = $user[3];
        $email = $user[4];
        $role = $user[5];
        if ($role != "user") {
            echo "       
                <tr>
                    <th scope='row'>$id</th>
                    <td>$full_name</td>
                     <td>$username</td>
                    <td>$address</td>
                    <td>$email</td>
                    <td>$role</td>
                    <td class='text-center'><button class='btn btn-danger'>Delete</button>  <button class='btn btn-success'>Edit</button></td>   </tr>
                <tr>  
        ";
        }
    }
}

?>
<div class="mb-3">
    <button type="button" class="btn btn-secondary btn-lg" disabled>Employees</button>
    <a href="/userList/customers" class="btn btn-primary btn-lg" >Customers</a>
</div>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Full Name</th>
        <th scope="col">Address</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col"></th>


    </tr>
    </thead>
    <tbody>
    <?php
    getUserRows();
    ?>
    </tbody>
</table>

<a href="createUser" class="btn btn-primary">Add User</a>