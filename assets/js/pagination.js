$(document).ready(function(){

    
    $('body').on('click','.pag',function(e){

        e.preventDefault();
        
        let limit = $(this).data("limit");

        $.ajax({
            url:"models/products/getProductsWithPagination.php",
            method:"GET",
            dataType:"json",
            data:
            {
                limit
            },
            success:function(data)
            {
                printProducts(data.products);

                printPagination(data.pagination);
            }

        })

    })

    function printProducts(products)
    {
        let html = ``;

        for(product of products){

            html+=singleProduct(product);
        }

        $('#products').html(html);

    }

    function singleProduct(product){

        return `  <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
        <!-- Block2 -->
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
                    ${product.price}
                </span>
            </div>
        </div>
    </div>`;

    }

    function printPagination(number)
    {
        let html = "";

        for(let i=0; i<number; i++){

            html+=`
            <a href="#" class="item-pagination flex-c-m trans-0-4 pag" data-limit="${i}">${i+1}</a>
            `;
        }

        $('#pagination').html(html);
    }

    

})