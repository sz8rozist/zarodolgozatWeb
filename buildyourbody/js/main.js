$(document).ready(function(){
    //Login
    $(".login").click(function(){
        let userN = $("#username").val();
        let pw = $("#password").val();
        if(userN == "" || pw == ""){
            $("#password").after("<div class='alert alert-warning text-center'>Minden mező kitöltése kötelező!</div>");
            $(".alert-warning").delay(1000).fadeOut(1800);
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
                    }else{
                        $("#password").after("<div class='alert alert-danger text-center'>Sikertelen bejelentkezés!</div>");
                        $(".alert-danger").delay(1000).fadeOut(1800);
                    }
                }
            });
        }
    });
    //Login
    //Registration
    $(".btn-reg").click(function(){
        let nev = $("input[name='name']").val();
        let email = $("input[name='email']").val();
        let fname = $("input[name='fname']").val();
        let pw = $("input[name='pw']").val();
        let tsuly = $("input[name='tsuly']").val();
        let tmagassag = $("input[name='tmagassag']").val();
        if(nev == "" || email == "" || fname == "" || pw == "" || tsuly == "" || tmagassag == ""){
            $(".reg-message").html("<div class='alert alert-warning text-center'>"+"<i class='fa fa-exclamation-triangle'></i>Minden mező kitöltése kötelező!</div>");
        }else{
            $(".reg-message").html("");
            $.ajax({
                url: 'profile/reg.php',
                method: 'POST',
                data: {name:nev, email:email, fname:fname, pw:pw, tsuly:tsuly, tmagassag:tmagassag},
                success: function(response){
                    $(".reg-message").html("<div class='alert alert-success text-center'>"+"<i class='fa fa-check'></i>"+response+"</div>").delay(1000).fadeOut(1800);
                }
            });
        }
     
    });
    //Registration
    //Update profile
    $(".update-profile").click(function(e){
        e.preventDefault();
        $(".form-control").removeAttr("readonly");
        $(".savenew-profile").removeAttr("disabled");
    });
    $(".savenew-profile").click(function(e){
        e.preventDefault();
        let nev = $("#input-teljesnev").val();
        let email = $("#input-email").val();
        let fname = $("#input-fname").val();
        let pw = $("#input-pw").val();
        let tsuly = $("#input-tsuly").val();
        let tmagassag = $("#input-tmagassag").val();
        console.log(nev+", "+email+", "+fname+", "+pw+", "+tsuly+", "+tmagassag);
        $.ajax({
            url: 'update_profile.php',
            method: 'POST',
            data: {nev:nev,email:email,fname:fname,pw:pw,tsuly:tsuly,tmagassag:tmagassag},
            success: function(response){
                if(response === "1"){
                    $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='alert alert-success text-center'><i class='fa fa-check'></i>Sikeres módosítás!</div></div>");
                    setTimeout(function(){
                        $(".alert-success").delay(1000).fadeOut(1800);
                        $(".form-control").attr("readonly",true);
                        $(".savenew-profile").attr("disabled",true);
                    },600);
                }else{
                    $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='alert alert-warning text-center'><i class='fa fa-warning'></i>Ooops... Hiba történt!</div></div>");
                }
            }
        });
    });
     //Update profile
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
     $("#reg").click(function(){
        $('html, body').animate({ scrollTop: $(".registration").offset().top}, 1500);
          return false;
    });
    $("#rolunk").click(function(){
        $('html, body').animate({ scrollTop: $(".tartalom-app").offset().top}, 1500);
          return false;
    });
    $("#eletmod").click(function(){
        $('html, body').animate({ scrollTop: $(".kiegeszito").offset().top}, 1500);
           return false;
    });
    $("#kezdolap").click(function(){
        $('html, body').animate({ scrollTop: 0}, 1500);
           return false;
    });
    //Window Scroll
    //Izomcsoport
    $(document).on('change','.izom',function(){
        let izom = $(this).val();
        let izomcsid = $(this).children(":selected").attr("id");
        console.log(izomcsid,izom);
        $.ajax({
            url: "getgyakorlatok.php",
            method: "POST",
            data: {izomcsid:izomcsid},
            success: function(data){
                $(".gyakorlat-leiras").html(data);
            }
        });
    });
    //Izomcsoport

});
