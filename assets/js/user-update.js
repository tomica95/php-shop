$(document).ready(function(){

    $('#users').on('click','.update',function(){

        let id=$(this).data('id');

        $.ajax({
            url:"models/admin/user/update.php",
            method:"POST",
            data:{
                id
            },
            dataType:"json",
            success:function(data){



            },
            error:function(error){

                console.log(error);
            }
        })

    })
    
})