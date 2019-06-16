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
                       Email: <input type="text" name="username" value="${data.user.email}"></br>

                        Password: <input type="text" name="password" value="${data.user.password}"></br>

                      
                        <select name="role_id">
                            <option>Choose role..</option>`;
                            for(role of data.roles){

                                html+=`<option value="${role.id}">${role.name}</option>`;
                            }

                        
                html+=`     </select>

                        <input type="hidden" value="${data.user.id}" name="id">

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