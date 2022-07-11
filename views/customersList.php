<?php

use app\models\UserModel;

function getUserRows()
{
    $userModel = new UserModel();
    $userModelList = $userModel->getAllUsersWithRoles();



    foreach ($userModelList as $user) {

        $id = $user[0];
        $full_name = $user[1];
        $username = $user[2];
        $address = $user[3];
        $email = $user[4];
        $role = $user[5];
        $active = $user[6];
        if ($role == "user" and $active) {
            echo "       
                <tr>
                    <th scope='row'>$id</th>
                    <td>$full_name</td>
                     <td>$username</td>
                    <td>$address</td>
                    <td>$email</td>
                    <td>$role</td>
                    <td class='text-center'>
                        <form class='d-inline' method='post' action='/deleteProcess'>
                            <button class='btn btn-danger'>Delete</button> 
                            <input name='id' type='hidden' value='$id'>
                        </form>
                        <form class='d-inline' method='get' action='/edit'>
                            <button class='btn btn-success d-inline'>Edit</button>
                            <input name='id' type='hidden' value='$id'>
                        </form
                    </td>   
                    
                    
                 </tr>
        ";
        }
    }
}

?>
<div class="mb-3">
    <a href="/userList/employees" class="btn btn-primary btn-lg" >Employees</a>
    <button type="button" class="btn btn-secondary btn-lg"  disabled>Customers</button>

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

<a href="/createUser" class="btn btn-primary">Add User</a>