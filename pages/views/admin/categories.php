<h2> Categories </h2>
<div id="categories">
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
        <td>
            <form method="POST" action="models/admin/category/delete.php">
                
            <input type="submit" name="delete" value="Delete">

            <input type="hidden" name="id" value="<?=$category->id?>">
            </form>
        </td>
        <td>
            <button class="update-category" data-id="<?=$category->id?>">Update</button>
        </td>
    </tr>
        <?php endforeach;?>

</table>

    <div id="category-update"></div>

</div>