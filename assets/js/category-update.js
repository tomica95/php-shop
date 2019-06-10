$(document).ready(function(){

    $('#categories').on('click','.update-category',function(){

        let id = $(this).data('id');

        $.ajax({
            url:"models/admin/category/category_update.php",
            method:"POST",
            data:
            {
                id
            },
            dataType:"json",
            success:function(data){
                
                let html = `
                <form method="POST" action="models/admin/category/update.php">
                       Name: <input type="text" name="name" value="${data.category_name}"></br>

                       <input type="hidden" value="${data.id}" name="id">

                    <input type="submit" value="Update" name="category_update">

                `;

                $('#category-update').html(html);
                
            },
            error:function(error){

                console.log(error);
            }
        })
        
    });



})