<?php 

    include "models/admin/product/product_functions.php";

    $products = getAllProductsWithPictureAndCategory();

    $categories = getAllCategories();
    


    
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
                <td><?=$product->id?></td>
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
                            <option value="<?=$product->id?>"><?=$product->product_name?></option>
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
                      </br>

                      <h2>Insert product</h2>

                      
                           

                 <form action="models/admin/product/insert_product.php" method="POST">
                  <div class="form-group">
                    <label for="username">Product name</label>
                    <input type="text" name="product-name"  tabindex="1" class="form-control" placeholder="Product-name" value="">
                  </div>
                  <div class="form-group">
                    <label for="password">Price</label>
                    <input type="text" name="price" tabindex="2" class="form-control" placeholder="Price">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Description</label>
                    <input type="text" name="description"  tabindex="2" class="form-control" placeholder="Description">
                  </div>
                  <select name="category_id">

                    <option>Choose category..</option>
                    <?php foreach($categories as $category): ?>
                    <option value="<?=$category->id?>"><?=$category->category_name?></option>
                    <?php endforeach; ?>

                    </select>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="insert-product" tabindex="4" class="btn btn-success" value="Insert product">
                      </div>
                    </div>
                  </div>
                </form>