$(document).ready(function(){
    $(".edzesbtn").click(function(){
        $(".edzes").fadeIn(800);
    });
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
