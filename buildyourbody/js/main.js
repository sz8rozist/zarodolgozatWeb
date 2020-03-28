$(document).ready(function() {
    /* ------------------------------- Login -------------------------------*/
    $(".login").click(function() {
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
                success: function(response) {
                    if (response === "Yes") {
                        setTimeout(function() {
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
    $(function() {
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


        $("[name=name]").focusout(function() {
            check_name();
        });
        $("[name=email]").focusout(function() {
            check_email();
        });
        $("[name=fname]").focusout(function() {
            check_fname();
        });
        $("[name=reg-pw]").focusout(function() {
            check_pw();
        });
        $("[name=tsuly]").focusout(function() {
            check_tsuly();
        });
        $("[name=tmagassag]").focusout(function() {
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
            var emailregex = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
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
            var regexNumber = new RegExp(/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+)[0-9a-zA-Z]*$/);
            var fname = $("[name=fname]").val();
            if (regexNumber.test(fname) && fname.length > 6) {
                $(".fname-message").hide();

            } else {
                $(".fname-message").html("Min. 6 karakter és számot is kell tartalmazzon!");
                $(".fname-message").show();
                error_fname = true;
            }
        }

        function check_pw() {
            var regexpw = new RegExp(/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+)[0-9a-zA-Z]*$/);
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

        $(".btn-reg").click(function() {
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
                    success: function(response) {
                        $(".reg-message").html("<div class='text-success text-center'>" + "<i class='fa fa-check'></i>" + response + "</div>");
                        setTimeout(function() {
                            location.reload();
                        }, 800);
                    }
                });
            }
        });

    });

    /* ------------------------------- Registration -------------------------------*/



    /* ------------------------------- Update profile -------------------------------*/
    $(function() {
        $(".name-text").hide();
        $(".email-text").hide();
        $(".fname-text").hide();
        $(".pw-text").hide();
        $(".tsuly-text").hide();
        $(".tmagassag-text").hide();

        let name_error = false;
        let email_error = false;
        let fname_error = false;
        let pw_error = false;
        let tsuly_error = false;
        let tmagassag_error = false;

        $("#input-teljesnev").focusout(function() {
            validate_name();
        });
        $("#input-email").focusout(function() {
            validate_email();
        });
        $("#input-fname").focusout(function() {
            validate_fname();
        });
        $("#input-pw").focusout(function() {
            validate_pw();
        });
        $("#input-tsuly").focusout(function() {
            validate_tsuly();
        });
        $("#input-tmagassag").focusout(function() {
            validate_tmagassag();

        });

        function validate_name() {
            let regex1 = new RegExp(/^[a-zA-Z ]*$/);
            let name = $("#input-teljesnev").val();
            if (!regex1.test(name)) {
                $(".name-text").hide();
            } else {
                $(".name-text").html("Kis és nagybetűt és szóköznt is tartalmaznia kell");
                $(".name-text").show();
                name_error = true;
            }
        }

        function validate_email() {
            let regex2 = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
            let email = $("#input-email").val();
            if (regex2.test(email)) {
                $(".email-text").hide();
            } else {
                $(".email-text").html("Hibás email cím!");
                $(".email-text").show();
                email_error = true;
            }
        }

        function validate_fname() {
            let regex3 = new RegExp(/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+)[0-9a-zA-Z]*$/);
            let fname = $("#input-fname").val();
            if (fname.length >= 6 && regex3.test(fname)) {
                $(".fname-text").hide();
            } else {
                $(".fname-text").html("Min. 6 karakter és számot is kell tartalmazzon!");
                $(".fname-text").show();
                fname_error = true;
            }
        }

        function validate_pw() {
            let regex3 = new RegExp(/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+)[0-9a-zA-Z]*$/);
            let pw = $("#input-pw").val();
            if (pw.length >= 6 && regex3.test(pw)) {
                $(".pw-text").hide();
            } else {
                $(".pw-text").html("Min. 6 karakter és számot is kell tartalmazzon!");
                $(".pw-text").show();
                pw_error = true;
            }
        }

        function validate_tsuly() {
            let number = new RegExp(/^[0-9]+$/);
            let tsuly = $("#input-tsuly").val();
            if (number.test(tsuly)) {
                $(".tsuly-text").hide();

            } else {
                $(".tsuly-text").html("Csak számot adhatsz meg!");
                $(".tsuly-text").show();
                tsuly_error = true;
            }
        }


        function validate_tmagassag() {
            let number = new RegExp(/^[0-9]+$/);
            let tmagassag = $("#input-tmagassag").val();
            if (number.test(tmagassag)) {
                $(".tmagassag-text").hide();


            } else {
                $(".tmagassag-text").html("Csak számot adhatsz meg!");
                $(".tmagassag-text").show();
                tmagassag_error = true;
            }
        }


        $(".savenew-profile").click(function(e) {
            e.preventDefault();
            let nev = $("#input-teljesnev").val();
            let email = $("#input-email").val();
            let fname = $("#input-fname").val();
            let pw = $("#input-pw").val();
            let tsuly = $("#input-tsuly").val();
            let tmagassag = $("#input-tmagassag").val();
            name_error = false;
            email_error = false;
            fname_error = false;
            pw_error = false;
            tsuly_error = false;
            tmagassag_error = false;

            validate_email();
            validate_name();
            validate_fname();
            validate_pw();
            validate_tmagassag();
            validate_tsuly();

            if (name_error == false && email_error == false && fname_error == false && pw_error == false && tsuly_error == false && tmagassag_error == false) {
                //console.log(nev + ", " + email + ", " + fname + ", " + pw + ", " + tsuly + ", " + tmagassag);
                $.ajax({
                    url: '../php/update_profile.php',
                    method: 'POST',
                    data: { nev: nev, email: email, fname: fname, pw: pw, tsuly: tsuly, tmagassag: tmagassag },
                    success: function(response) {
                        if (response === "1") {
                            $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='u text-center text-success'><i class='fa fa-check'></i>Sikeres módosítás!</div></div>");
                            setTimeout(function() {
                                $(".u").delay(1000).fadeOut(800);
                                $(".form-control").attr("readonly", true);
                                $(".savenew-profile").attr("disabled", true);
                            }, 600);
                        } else {
                            $(".gombok").after("<div class='col-lg-12' style='padding-top: 1rem;'><div class='text-center text-danger'><i class='fa fa-warning'></i>Ooops... Hiba történt!</div></div>");
                        }
                    }
                });
            }

        });

    });
    $(".update-profile").click(function(e) {
        e.preventDefault();
        $(".form-control").removeAttr("readonly");
        $(".savenew-profile").removeAttr("disabled");
    });
    /* ------------------------------- Update profile -------------------------------*/

    /* ------------------------------- Window Scroll -------------------------------*/
    $(window).scroll(function() {
        if ($(window).scrollTop() > 60) {
            $('.scrolltop').fadeIn(800);
        } else {
            $('.scrolltop').fadeOut(800);
        }
    });
    $('.scrolltop').click(function() {
        $('html,body').animate({ scrollTop: 0 }, 1500);
        return false;
    });
    $("#reg").click(function() {
        $('html, body').animate({ scrollTop: $(".registration").offset().top }, 1500);
        return false;
    });
    $("#rolunk").click(function() {
        $('html, body').animate({ scrollTop: $(".tartalom-app").offset().top }, 1500);
        return false;
    });
    $("#eletmod").click(function() {
        $('html, body').animate({ scrollTop: $(".kiegeszito").offset().top }, 1500);
        return false;
    });
    $("#kezdolap").click(function() {
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
            success: function(data) {
                $(".gyakorlat-leiras").html(data);
            }
        });
    }
    $(document).on('change', '.izom', function() {
        load_gyakorlatok();
    });
    $(".saveUjGyakorlat").click(function() {
        let gynev = $("[name=gynev]").val();
        let leiras = $("[name=leiras]").val();
        let izom = $("[name=cs]").children(":selected").val();
        $.ajax({
            url: "../php/insert_gyakorlat.php",
            method: "POST",
            data: { gynev: gynev, leiras: leiras, izom: izom },
            success: function(data) {
                if (data == "1") {
                    $(".uzenet").html("<span class='text-success'>Sikeres módosítás!</span>");
                    setTimeout(function() {
                        $("#exampleModalCenter").modal('hide');
                        $(".uzenet").html("");
                        $("[name=gynev]").val("");
                        $("[name=leiras]").val("");
                        load_gyakorlatok();
                    }, 500);
                }
            }
        });
    });
    $(document).on('click', '#del-gyakorlatok', function() {
        let gyakorlatid = $(this).attr("data-id");
        $.ajax({
            url: "../php/delete_gyakorlat.php",
            method: "POST",
            data: { gyakorlatid: gyakorlatid },
            success: function(data) {
                if (data == "1") {
                    location.reload();
                }
            }
        });
    });

    $(document).on('click', '#update-gyakorlatok', function() {
        let gyid = $(this).attr("data-id");
        $.ajax({
            url: "../php/get_modify_gyakorlat.php",
            method: "POST",
            data: { gyid: gyid },
            dataType: "json",
            success: function(data) {
                $("#mgy").val(data.gynev);
                $("#modify-leiras").html(data.leiras);
                $("#gyid").val(data.gyakorlatok_id);


            }
        });
    });
    $(document).on('click', '.modifyGyakorlat', function(e) {
            e.preventDefault();
            let gyid = $("#gyid").val();
            let gyak = $("#mgy").val();
            let leiras = $("#modify-leiras").html();
            $.ajax({
                url: "../php/update_gyakorlat.php",
                method: "POST",
                data: { gyid: gyid, gyak: gyak, leiras: leiras },
                success: function(response) {
                    if (response == "1") {
                        $(".msg").html("<span class='text-success'>Sikeres módosítás!</span>");
                        setTimeout(function() {
                            $("#exampleModalCenterUpdateGyakorlat").modal('hide');
                            $(".msg").html("");
                            load_gyakorlatok();
                        }, 500);
                    }
                }
            });

        })
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
            success: function(data) {
                $(".table").html(data);
            }
        });

    }
    $(document).on('click', '.pagination_link_gyakorlatok', function() {
        let page = $(this).attr("id");
        load_gyakorlatok(page);
    });
    $(document).on('change', '.date', function() {
        load_data();
    });

    $(document).on('click', '.pagination_link', function() {
        let page = $(this).attr("id");
        //console.log(page);
        load_data(page);
    });
    $(document).on('click', '#edzes_trash', function() {
        let id = $(this).attr("data-id");
        //console.log(id);
        $.ajax({
            url: '../php/delete_edzes.php',
            method: 'POST',
            data: { id: id },
            success: function(response) {
                if (response == "Data Deleted") {
                    location.reload();
                }

            }
        });
    });

    $(document).on('click', '.saveUjEdzes', function() {
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
                    success: function(response) {
                        if (response == "Done") {
                            $("#msg").html("<span class='text-success'>Sikeres Mentés!</span>");
                            setTimeout(function() {
                                $("#exampleModalCenter").modal('hide');
                                $("#msg").html("");
                                $("[name=sorozatszam]").val("");
                                $("[name=ismetlesszam]").val("");
                                load_data();
                            }, 500);
                        }
                    }
                });
            }

        }
        //console.log(gynev, sszam, isszam);
    });
    $(document).on('change', '.ics', function() {
        let izomid = $(this).children(":selected").attr('id');
        //console.log(izomid);
        $.ajax({
            url: '../php/getgy.php',
            method: 'POST',
            data: { izomid: izomid },
            success: function(data) {
                $(".gy").html(data);
            }
        });
    });
    /* ------------------------------- Edzés -------------------------------*/


});