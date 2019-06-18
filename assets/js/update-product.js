$(document).ready(function(){

    $('#products').on('click','.update-product',function(){

        let id =$(this).data('id');

        console.log(id);

        $.ajax({
            url:"models/admin/product/product_update.php",
            method:"POST",
            data:
            {
                id
            },
            dataType:"json",
            success:function(data){

                printProductUpdate(data);

            },
            error:function(error){

                alert(error);
            }
        })
        

    })

    function printProductUpdate(data)
    {
        let html =``;

        html+=`
        <form action="models/admin/product/update.php" method="POST" enctype="multipart/form-data">

                        

                        <p style="color: #9e9e9e;font-size: 12px;font-weight:400;">Choose category:</p>
                  `;

                    html+=printCategories(data.categories);
                html+=`
                    

                        <div class="form-group">
                    <label for="username">Product name</label>
                    <input type="text" name="product-name"  tabindex="1" class="form-control" placeholder="Product-name" value="${data.product.product_name}">
                  </div>
                  <div class="form-group">
                    <label for="password">Price</label>
                    <input type="text" name="price" tabindex="2" class="form-control" placeholder="Price" value="${data.product.price}">
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Description</label>
                    <input type="text" name="description"  tabindex="2" class="form-control" placeholder="Description" value="${data.product.description}">
                  </div>

                  <input type="hidden" name="id" value="${data.product.product_id}">

                  <div class="input-field">
                          <button type="button" onclick="document.getElementById('productPicture').click()" class="btn btn-info">Add picture to product</button>
                          <span id="productPictureValue"></span>

                          <input type="file" name="picture" id="productPicture" style="display:none;" onchange="document.getElementById('productPictureValue').innerHTML=this.value;"/>
                        </div>

                        <div class="input-field">
                            <input type="submit" value="Update product" name="update-product" class="btn btn-success"/>
                        </div> 

                        
                      </form>`;

                      $('#update').html(html);
    }

    function printCategories(categories)
    {
        let primac = `<select name="category_id">`;

        for(category of categories){

            primac+=`<option value="${category.id}">${category.category_name}</option>`;
        }
        primac +=`</select>`;

        return primac;
    }


})