$(document).ready(function(){
    //Login
    $(".error").hide();
    $(".success").hide();
    $(document).on('click','.login', function(e){
        e.preventDefault();
        let user = $(".username").val();
        let pw = $(".password").val();
        //console.log(user);
        //console.log(pw);
        $.ajax({
            method: 'POST',
            url: 'login.php',
            data: {u:user, p:pw},
            success: function(data){
                $(".login").show();
                $(".error").hide();
                $(".success").html('<i class="fa fa-check"></i>Sikeres Bejelentkezés');
                setTimeout(function(){
                    $(".success").show();
                },1000);
                setTimeout(function(){window.location = "home.php"} , 2000); 
            },
            error: function(){
                $(".success").hide();
                $(".login").show();
                $(".error").html('<i class="fa fa-warning"></i>Hiba a bejelentkezés során');
                setTimeout(function(){
                    $(".error").show();
                },1000);
            }
        });
    });
    //Login
    //Change password
    $(document).on('click','.savenewpw',function(e){
        e.preventDefault();
        let newpw = $(".pw").val();
        let newpwconfirm = $(".pw-confirm").val();
        $.ajax({
            method: 'POST',
            url: 'changepassword.php',
            data: {newpw:newpw, newpwconfirm: newpwconfirm},
            success: function(data){
              
            },
            error: function(){
               
            }
        });
    });
    //Change password
});