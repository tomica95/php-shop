<?php if(isset($_SESSION['user'])&&$_SESSION['user']->role_id==1): ?>


<div id="centar">
<h1>Admin panel </h1>
<style> #centar{margin-left:500px;} </style>

    <?php 

        include "admin/users.php";

        include "admin/categories.php";

        include "admin/products.php";

        include "admin/logs.php";
    
    ?>
</div> 
<?php endif; ?>
