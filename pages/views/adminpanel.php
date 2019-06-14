<?php if(isset($_SESSION['user'])&&$_SESSION['user']->role_id==1): ?>

<h1>Admin panel </h1>

    <?php 

        include "admin/users.php";

        include "admin/categories.php";

        include "admin/products.php";
    
    ?>
    
<?php endif; ?>
