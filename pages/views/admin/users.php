<h2>Users</h2>

<table border="1" id="users">
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
        <td>
            <button class="update" data-id="<?=$user->id?>">Update</button>
        </td>
    </tr>
        <?php 
        endforeach;
        ?>
</table>    
        </br>

        <div id="update-form"></div>

        <div id="register-user">
        <h1>Register new User </h1></br>
        
         <form  method="POST" role="form" action="models/admin/user/register.php">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username"  tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  <select name="id_role">
                    <option>Choose role...</option>
                    <?php 

                    $roles = allRoles();

                    foreach($roles as $role):

                    ?>
                    <option value="<?=$role->id?>"><?=$role->name?></option>

                    <?php endforeach; ?>
                    
                  </select>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
        </div>

        </br></br>
        