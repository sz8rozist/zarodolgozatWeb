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
                $(".error").show();

            }
        });
    });
    //Login
    //Change password
    $(document).on('click','.savenewpw',function(e){
        e.preventDefault();
        let newpw = $(".pw").val();
        let newpwconfirm = $(".pw-confirm").val();
        if(newpw != "" && newpwconfirm != ""){
            if(newpw === newpwconfirm ){

                $.ajax({
                    method: 'POST',
                    url: 'changepassword.php',
                    data: {newpw:newpw},
                    success: function(){
                        $(".message").html("<span style='color:green;'>Sikeres jelszóváltoztatás!</span>").delay(1000).fadeOut(1800);
                        setTimeout(function(){
                            location.reload();
                        },2500);
                    },
                    error: function(){
                    }
                });
            }else{
                $(".message").html("A két jelszó nem egyezik!").delay(1000).fadeOut(1800);
            setTimeout(function(){
                location.reload();
            },2500);
            }
        }
        else{
            $(".message").html("Minden mező kitöltése kötelező!").delay(1000).fadeOut(1800);
            setTimeout(function(){
                location.reload();
            },2500);
        }

    });
    //Change password
    //Window Scroll
    $(window).scroll(function(){
        if($(window).scrollTop()>60){
            $('.scrolltop').fadeIn(800);
          }
          else{
            $('.scrolltop').fadeOut(800);
          }
    });
    $('.scrolltop').click(function(){
        $('html,body').animate({scrollTop: 0}, 1500);
        return false;
      });



     /* $("#contact").click(function(){
        $('html, body').animate({ scrollTop: $(".contact-form").offset().top}, 1000);
          return false;
        });*/
    //Window Scroll
});
