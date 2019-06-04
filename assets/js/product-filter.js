$(document).ready(function(){

    $('#sort').on('change',sort);

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

                console.log(data);
            },
            error:function(error){

                console.log(error);
            }
        })

    }
    
})