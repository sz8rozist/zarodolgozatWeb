$(document).ready(function () {
    /* ------------------------------- Login -------------------------------*/
    $(".login").click(function () {
        let userN = $("#username").val();
        let pw = $("#password").val();
        if (userN == "" || pw == "") {
            $("#password").after("<div class='alert alert-warning text-center'>Minden mező kitöltése kötelező!</div>");
            $(".alert-warning").delay(1000).fadeOut(1800);
        } else {
            $.ajax({
                url: "profile/login.php",
                method: "POST",
                dataType: "text",
                data: { username: userN, password: pw },
                success: function (response) {
                    if (response === "Yes") {
                        setTimeout(function () {
                            window.location = "profile/home.php";
                        }, 600);
                    } else {
                        $("#password").after("<div class='alert alert-danger text-center'>Sikertelen bejelentkezés!</div>");
                        $(".alert-danger").delay(1000).fadeOut(1800);
                    }
                }
            });
        }
    });
    /* ------------------------------- Login -------------------------------*/

    /* ------------------------------- Registration -------------------------------*/
    $(function () {
        $(".name-message").hide();
        $(".email-message").hide();
        $(".fname-message").hide();
        $(".pw-message").hide();
        $(".tsuly-message").hide();
        $(".tmagassag-message").hide();

        let error_name = false;
        let error_email = false;
        let error_fname = false;
        let error_pw = false;
        let error_tsuly = false;
        let error_tmagassag = false;


        $("[name=name]").focusout(function () {
            check_name();
        });
        $("[name=email]").focusout(function () {
            check_email();
        });
        $("[name=fname]").focusout(function () {
            check_fname();
        });
        $("[name=reg-pw]").focusout(function () {
            check_pw();
        });
        $("[name=tsuly]").focusout(function () {
            check_tsuly();
        });
        $("[name=tmagassag]").focusout(function () {
            check_tmagassag();
        });

        function check_name() {
            let regexp = new RegExp(/^[a-zA-Z ]*$/);
            let name = $("[name=name]").val();
            if (!regexp.test(name)) {
                $(".name-message").hide();

            } else {
                $(".name-message").html("Kis és nagybetűnek és szóköznek is kell lennie!");
                $(".name-message").show();
                error_name = true;
            }
        }
        function check_email() {
            var emailregex = new RegExp(/^(?=.{1,64}@)(?:("[^"\\]*(?:\\.[^"\\]*)*"@)|((?:[0-9a-z](?:\.(?!\.)|[-!#\$%&'\*\+\/=\?\^`\{\}\|~\w])*)?[0-9a-z]@))(?=.{1,255}$)(?:(\[(?:\d{1,3}\.){3}\d{1,3}\])|((?:(?=.{1,63}\.)[0-9a-z][-\w]*[0-9a-z]*\.)+[a-z0-9][\-a-z0-9]{0,22}[a-z0-9])|((?=.{1,63}$)[0-9a-z][-\w]*))$/)
            let email = $("[name=email]").val();
            if (emailregex.test(email)) {
                $(".email-message").hide();

            } else {
                $(".email-message").html("Hibás email cím!");
                $(".email-message").show();
                error_email = true;
            }
        }
        function check_fname() {
            var regexNumber = new RegExp(/[^A-Za-z0-9]+/);
            var fname = $("[name=fname]").val();
            if (fname.length >= 6 || regexNumber.test(fname)) {
                $(".fname-message").hide();

            } else {
                $(".fname-message").html("Min. 6 karakter és számot is kell tartalmazzon!");
                $(".fname-message").show();
                error_fname = true;
            }
        }
        function check_pw() {
            var regexpw = new RegExp(/^[a-zA-Z0-9]*$/);
            var pw = $("[name=reg-pw]").val();
            if (pw.length >= 7 && regexpw.test(pw)) {
                $(".pw-message").hide();

            } else {
                $(".pw-message").html("Min. 7 karakter és számot is kell tartalmazzon!");
                $(".pw-message").show();
                error_pw = true;
            }
        }
        function check_tsuly() {
            let number = new RegExp(/^[0-9]+$/);
            let tsuly = $("[name=tsuly]").val();
            if (number.test(tsuly)) {
                $(".tsuly-message").hide();

            } else {
                $(".tsuly-message").html("Csak számot adhatsz meg!");
                $(".tsuly-message").show();
                error_tsuly = true;
            }
        }
        function check_tmagassag() {
            let number = new RegExp(/^[0-9]+$/);
            let tmagassag = $("[name=tmagassag]").val();
            if (number.test(tmagassag)) {
                $(".tmagassag-message").hide();

            } else {
                $(".tmagassag-message").html("Csak számot adhatsz meg!");
                $(".tmagassag-message").show();
                error_tmagassag = true;
            }
        }

        $(".btn-reg").click(function () {
            let nev = $("input[name='name']").val();
            let email = $("input[name='email']").val();
            let fname = $("input[name='fname']").val();
            let pw = $("input[name='reg-pw']").val();
            let tsuly = $("input[name='tsuly']").val();
            let tmagassag = $("input[name='tmagassag']").val();

            error_name = false;
            error_email = false;
            error_fname = false;
            error_pw = false;
            error_tsuly = false;
            error_tmagassag = false;

            check_name();
            check_email();
            check_fname();
            check_pw();
            check_tsuly();
            check_tmagassag();

            if (error_name == false && error_email == false && error_fname == false && error_pw == false && error_tsuly == false && error_tmagassag == false) {
                $.ajax({
                    url: 'profile/reg.php',
                    method: 'POST',
                    data: { name: nev, email: email, fname: fname, pw: pw, tsuly: tsuly, tmagassag: tmagassag },
                    success: function (response) {
                        $(".reg-message").html("<div class='alert alert-success text-center'>" + "<i class='fa fa-check'></i>" + response + "</div>");
                        setTimeout(function () {
                            location.reload();
                        }, 800);
                    }
                });
            }
        });

    });

    /* ------------------------------- Registration -------------------------------*/



    /* ------------------------------- Update profile -------------------------------*/
    $(".update-profile").click(function (e) {
        e.preventDefault();
        $(".form-control").removeAttr("readonly");
        $(".savenew-profile").removeAttr("disabled");
    });
    $(".savenew-profile").click(function (e) {
        e.preventDefault();
        let nev = $("#input-teljesnev").val();
        let email = $("#input-email").val();
        let fname = $("#input-fname").val();
        let pw = $("#input-pw").val();
        let tsuly = $("#input-tsuly").val();
        let tmagassag = $("#input-tmagassag").val();
        //console.log(nev + ", " + email + ", " + fname + ", " + pw + ", " + tsuly + ", " + tmagassag);
        $.ajax({
            url: '../php/update_profile.php',
            method: 'POST',
            data: { nev: nev, email: email, fname: fname, pw: pw, tsuly: tsuly, tmagassag: tmagassag },
            success: function (response) {
                if (response === "1") {
                    $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='alert alert-success text-center'><i class='fa fa-check'></i>Sikeres módosítás!</div></div>");
                    setTimeout(function () {
                        $(".alert-success").delay(1000).fadeOut(1800);
                        $(".form-control").attr("readonly", true);
                        $(".savenew-profile").attr("disabled", true);
                    }, 600);
                } else {
                    $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='alert alert-warning text-center'><i class='fa fa-warning'></i>Ooops... Hiba történt!</div></div>");
                }
            }
        });
    });
    /* ------------------------------- Update profile -------------------------------*/

    /* ------------------------------- Window Scroll -------------------------------*/
    $(window).scroll(function () {
        if ($(window).scrollTop() > 60) {
            $('.scrolltop').fadeIn(800);
        }
        else {
            $('.scrolltop').fadeOut(800);
        }
    });
    $('.scrolltop').click(function () {
        $('html,body').animate({ scrollTop: 0 }, 1500);
        return false;
    });
    $("#reg").click(function () {
        $('html, body').animate({ scrollTop: $(".registration").offset().top }, 1500);
        return false;
    });
    $("#rolunk").click(function () {
        $('html, body').animate({ scrollTop: $(".tartalom-app").offset().top }, 1500);
        return false;
    });
    $("#eletmod").click(function () {
        $('html, body').animate({ scrollTop: $(".kiegeszito").offset().top }, 1500);
        return false;
    });
    $("#kezdolap").click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500);
        return false;
    });
    /* ------------------------------- Window Scroll -------------------------------*/

    /* -------------------------------Gyakorlatok -------------------------------*/
    function load_gyakorlatok(page) {
        let izom = $(".izom").val();
        let izomcsid = $(".izom").children(":selected").attr("id");
        //console.log(izomcsid, izom);
        $.ajax({
            url: "../php/getgyakorlatok.php",
            method: "POST",
            data: { izomcsid: izomcsid, page: page },
            success: function (data) {
                $(".gyakorlat-leiras").html(data);
            }
        });
    }
    $(document).on('change', '.izom', function () {
        load_gyakorlatok();
    });
    /* ------------------------------- Gyakorlatok -------------------------------*/

    /* ------------------------------- Edzés -------------------------------*/
    function load_data(page) {
        let date = $(".date option:selected").text();
        //console.log(date);
        $.ajax({
            url: "../php/getedzesek.php",
            method: "POST",
            dataType: "text",
            data: { date: date, page: page },
            success: function (data) {
                $(".table").html(data);
            }
        });

    }
    $(document).on('click', '.pagination_link_gyakorlatok', function () {
        let page = $(this).attr("id");
        load_gyakorlatok(page);
    });
    $(document).on('change', '.date', function () {
        load_data();
    });

    $(document).on('click', '.pagination_link', function () {
        let page = $(this).attr("id");
        //console.log(page);
        load_data(page);
    });
    $(document).on('click', '#edzes_trash', function () {
        let id = $(this).attr("data-id");
        //console.log(id);
        $.ajax({
            url: '../php/delete_edzes.php',
            method: 'POST',
            data: { id: id },
            success: function (response) {
                if (response == "Data Deleted") {
                    location.reload();
                }

            }
        });
    });

    $(document).on('click', '.saveUjEdzes', function () {
        let gyakorlatid = $(".gya").children(":selected").attr("id");
        //console.log(gyakorlatid);
        let sszam = $("[name=sorozatszam]").val();
        let isszam = $("[name=ismetlesszam]").val();
        if ((sszam == "" || isszam == "")) {
            document.getElementById("message").innerHTML = "<p>Minden mező kitöltése kötelező!</p>";
        } else {
            var number = /^[0-9]+$/;
            if (!sszam.match(number) || !isszam.match(number)) {
                document.getElementById("message").innerHTML = "<p>Az ismétlésszám és a sorozatszám csak szám lehet!</p>";
            } else {
                document.getElementById("message").innerHTML = "";
                $.ajax({
                    url: "../php/insert_edzesterv.php",
                    method: "POST",
                    data: { gyakorlatid: gyakorlatid, sszam: sszam, isszam: isszam },
                    success: function (response) {
                        if (response == "Done") {
                            $("#exampleModalCenter").fadeOut(600);
                            setTimeout(function () {
                                location.reload();
                            }, 650);
                        }
                    }
                });
            }

        }
        //console.log(gynev, sszam, isszam);
    });
    $(document).on('change', '.ics', function () {
        let izomid = $(this).children(":selected").attr('id');
        //console.log(izomid);
        $.ajax({
            url: '../php/getgy.php',
            method: 'POST',
            data: { izomid: izomid },
            success: function (data) {
                $(".gy").html(data);
            }
        });
    });
    /* ------------------------------- Edzés -------------------------------*/


});
