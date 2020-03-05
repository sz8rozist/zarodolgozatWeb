$(document).ready(function(){
    //Login
    $(".login").click(function(){
        let userN = $("#username").val();
        let pw = $("#password").val();
        if(userN == "" || pw == ""){
            $("#password").after("<div class='alert alert-danger text-center'>Minden mező kitöltése kötelező!</div>");
            $(".alert-danger").delay(1000).fadeOut(1800);
        }else{
            $.ajax({
                url: "profile/login.php",
                method: "POST",
                dataType: "text",
                data: {username:userN, password:pw},
                success: function(response){
                    if(response === "Yes"){
                        $("#password").after("<div class='alert alert-success text-center'>Sikeres bejelentkezés!</div>");
                        $(".alert-success").delay(1000).fadeOut(1800);
                        setTimeout(function(){
                            window.location = "profile/home.php";
                        },1200);
                    }
                }
            });
        }
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
