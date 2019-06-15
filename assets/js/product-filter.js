$(document).ready(function(){

    $('#sort').on('change',sort);

    $('#kategorije').on('click','.category',filterByCategory);

    function sort(){

        let sort = $(this).val();

        $.ajax({
            url:"models/products/sort.php",
            method:"POST",
            data:{
                sort:sort
            },
            dataType:'json',
            success:function(data){

                printProducts(data);
            },
            error:function(error){

                alert(error);
            }
        })

    }

    function filterByCategory(e){

        e.preventDefault();

        let id_category = $(this).data('id');

        $.ajax({
            url:"models/products/filter-category.php",
            method:"POST",
            data:{
                id:id_category
            },
            success:function(data){

                printProducts(data);

            },
            error:function(error){

                alert(error);
            }
        })

    }



    function printProducts(data){
        
        let receiver = "";

        for(let product of data){

            receiver+= singleProduct(product);
        }
        
        $('#products').html(receiver);

    }

    function singleProduct(product){

        return `<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
        <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                <img src="images/${product.src}" alt="${product.alt}">

                <div class="block2-overlay trans-0-4">
                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                    </a>

                    
                </div>
            </div>

            <div class="block2-txt p-t-20">
                <a href="index.php?page=product&id=${product.product_id}" class="block2-name dis-block s-text3 p-b-5">
                    ${product.product_name}
                </a>

                <span class="block2-price m-text6 p-r-5">
                    $ ${product.price}
                </span>
            </div>
        </div>
    </div>`;
    }
    
})