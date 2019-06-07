<h2>Users</h2>

<table border="1">
    <tr>
    <td>Id:</td>
    <td>Username:</td>
    <td>Role:</td>
    </tr>

    <?php

        include "models/admin/user/user_functions.php";

        $users = allUsers();

        foreach($users as $user):

    ?>
    <tr>
        <td><?=$user->id?></td>
        <td><?=$user->username ?></td>
        <td><?=$user->name ?>
        <td>
            <form method="POST" action="models/admin/user/delete.php">

            <input type="submit" name="delete" value="Delete">

            <input type="hidden" name="id" value="<?=$user->id?>">
            
            </form>
        </td>
    </tr>
        <?php 
        endforeach;
        ?>
</table>

