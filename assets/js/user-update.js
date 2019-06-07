$(document).ready(function(){

    $('#users').on('click','.update',function(){

        let id=$(this).data('id');

        $.ajax({
            url:"models/admin/user/user_update.php",
            method:"POST",
            data:{
                id
            },
            dataType:"json",
            success:function(data){

                let html = "";

                html+=`
                    <form method="POST" action="models/admin/user/update.php">
                       Username: <input type="text" name="username" value="${data.username}"></br>

                        Password: <input type="text" name="password" value="${data.password}"></br>

                        Role_id:<input type="text" value="${data.role_id}" name="role_id"></br>

                        <input type="hidden" value="${data.id}" name="id">

                        <input type="submit" value="Update">
                    </form>
                `;

                $('#update-form').html(html);


            },
            error:function(error){

                console.log(error);
            }
        })

    })
    
})