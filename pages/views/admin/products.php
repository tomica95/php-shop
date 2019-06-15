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
                <td><img src="images/<?=$product->src?>" alt="<?=$product->alt?>" width="100" height="100"></td>
                <td><form method="POST" action="models/admin/product/delete.php">
                    <input type="hidden" value="<?=$product->product_id?>" name="id">
                    <input type="submit" value="delete" name="delete-product">
                </form></td>
            </tr>
            <?php endforeach; ?>       
        </table>

    
    
    </div>

                        <form action="models/admin/product/insert_picture.php" method="POST" enctype="multipart/form-data">

                        <p style="color: #9e9e9e;font-size: 12px;font-weight:400;">Profilna slika</p>

                        <div class="input-field">
                          <button type="button" onclick="document.getElementById('profilePhoto').click()" class="btn btn-info">Add profile photo</button>
                          <span id="profilePhotoValue"></span>

                          <input type="file" name="slika" id="profilePhoto" style="display:none;" onchange="document.getElementById('profilePhotoValue').innerHTML=this.value;"/>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Sačuvaj" name="btnSacuvaj" class="btn btn-success col s12"/>
                        </div>   
                        
                      </form>