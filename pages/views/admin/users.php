<h2>Users</h2>

<table border="1" id="users">
    <tr>
    <td>Id:</td>
    <td>Username:</td>
    <td>Role:</td>
    <td>Logged:</td>
    </tr>

    <?php

        include "models/admin/user/user_functions.php";

        $number = countLoggedUsers();

        $numberOfLogged = $number->numberOfLogged;

        $users = allUsers();

        foreach($users as $user):

    ?>
    <tr>
        <td><?=$user->id?></td>
        <td><?=$user->username ?></td>
        <td><?=$user->name ?>
        <td><?=$user->logged ?>
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

        <h4>Number of logged users in this moment is: <?=$numberOfLogged ?> </h4>

        </br></br>

        <table border="1">

        <tr>
          <td>Date</td>
          <td>Page</td>
          <td>Ip adress</td>
        </tr>
        <?php 

              
            include "models/admin/log/functions.php";

            $datas = logFiles();

            foreach($datas as $data):

              $log = explode("\t",$data);
            

          ?>
          <tr>
          <td><?=$log[0]?></td>
          <td><?=$log[1]?></td>
          <td><?=$log[2]?></td>
        </tr>
            
            <?php endforeach; ?>
        </table>

        <div id="update-form"></div>

        <div id="register-user">
        <h1>Register new User </h1></br>
        
         <form  method="POST" role="form" action="models/admin/user/register.php">
                  <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" name="username"  tabindex="1" class="form-control" placeholder="Email" value="">
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
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="btn btn-success" value="Register Now">
                      </div>
                    </div>
                  </div>
                </form>
        </div>

        </br></br>
        