<h2> Categories </h2>

<table border="1">
    <tr>
        <td>Id</td>
        <td>Name</td>
    </tr>
    <?php

        include "models/admin/category/category_functions.php";

        $categories = allCategories();

        foreach($categories as $category):

    ?>
    <tr>
        <td><?=$category->id?></td>
        <td><?=$category->category_name?></td>
    </tr>
        <?php endforeach;?>

</table>

