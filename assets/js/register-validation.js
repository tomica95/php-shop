document.getElementById('register-submit').addEventListener('click',function(e){



var mail = document.getElementById('username');

var regMail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;;


var password = document.getElementById('password');

var regPassword =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,}$/;

var password2 = document.getElementById('confirm-password');

var greske = [];

//checking mail
if(!regMail.test(mail.value)){

    
    alert("You email was not good");
    greske.push('Bad mail');
}

//checking password 
if(!regPassword.test(password.value)){

    alert("Your password must have min 8 characters, one Big letter and one number");
   
    greske.push('Bad password');
}

//checking password retype
if(password.value!=password2.value || password2.value=="")
{
   alert("You must confirm your password");

}



if(greske.length!=0){

    e.preventDefault();
}






});