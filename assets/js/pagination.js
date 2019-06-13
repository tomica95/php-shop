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

    

})