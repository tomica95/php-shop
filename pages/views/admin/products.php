<?php 

    include "models/admin/product/product_functions.php";

    $products = getAllProductsWithPictureAndCategory();
    
?>
    <h2>Products</h2>

    <div id="products">

        <table border="1">
            <tr>
                <td>Id-product</td>
                <td>Name</td>
                <td>Price</td>
                <td>Description</td>
                <td>Category</td>
                <td>Date</td>
                <td>Picture</td>
            </tr>

            <?php foreach($products as $product): ?>

            <tr>
                <td><?=$product->product_id?></td>
                <td><?=$product->product_name?></td>
                <td><?=$product->price?></td>
                <td><?=$product->description?></td>
                <td><?=$product->category_name?></td>
                <td><?=$product->date?></td>
                <td><img src="<?=$product->small_picture?>" width="100" height="100"></td>
                <td><form method="POST" action="models/admin/product/delete.php">
                    <input type="hidden" value="<?=$product->product_id?>" name="id">
                    <input type="submit" value="delete" name="delete-product">
                </form></td>
            </tr>
            <?php endforeach; ?>       
        </table>

    
    
    </div>

                        <form action="models/admin/product/insert_picture.php" method="POST" enctype="multipart/form-data">

                        <p style="color: #9e9e9e;font-size: 12px;font-weight:400;">Picture of product</p>

                        <select name="product_id">
                            <option>Choose product</option>
                            <?php foreach($products as $product): ?>
                            <option value="<?=$product->product_id?>"><?=$product->product_name?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="input-field">
                          <button type="button" onclick="document.getElementById('productPicture').click()" class="btn btn-info">Add picture to product</button>
                          <span id="productPictureValue"></span>

                          <input type="file" name="pictue" id="productPicture" style="display:none;" onchange="document.getElementById('productPictureValue').innerHTML=this.value;"/>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Save picture" name="savePicture" class="btn btn-success"/>
                        </div>   
                        
                      </form>