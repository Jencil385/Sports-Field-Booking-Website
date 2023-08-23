!(function ($) {
    "use strict";
    // Smooth scroll for the navigation menu and links with .scrollto classes
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            e.preventDefault();
            var target = $(this.hash);
            if (target.length) {

                var scrollto = target.offset().top;
                var scrolled = 20;

                if ($('#header').length) {
                    scrollto -= $('#header').outerHeight()

                    if (!$('#header').hasClass('header-scrolled')) {
                        scrollto += scrolled;
                    }
                }

                if ($(this).attr("href") == '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
                return false;
            }
        }
    });

    // Mobile Navigation
    if ($('.nav-menu').length) {
        var $mobile_nav = $('.nav-menu').clone().prop({
            class: 'mobile-nav d-lg-none'
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
        $('body').append('<div class="mobile-nav-overly"></div>');

        $(document).on('click', '.mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').toggle();
        });

        $(document).on('click', '.mobile-nav .drop-down > a', function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass('active');
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
                    $('.mobile-nav-overly').fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, .mobile-nav');

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    if ($(window).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
    }

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });

    // Initiate the venobox plugin
    $(window).on('load', function () {
        $('.venobox').venobox();
    });

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000
    });

    // Initiate venobox lightbox
    $(document).ready(function () {
        $('.venobox').venobox();
    });

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1
    });

    // Initi AOS
    AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false
    });


    $('.log-in').click(function (e) {
        if ($(window).width() < 993) {
            e.stopPropagation();
            if ($(".log-in").parent().hasClass("active")) {
                $(".log-in").parent().removeClass("active");
                $(".log-in").removeClass("show");
                // $(".dropdown-menu").removeClass("show");
                $(".dropdown-menu").slideUp(500);
            } else {
                $(".log-in").parent().addClass("active");
                $(".log-in").addClass("show");
                $(".dropdown-menu").slideDown(500);

            }
        }
    });

    $('.log a').click(function () {
        if ($(window).width() < 993) {
            $(".iti-mobile").removeClass("mobile-nav-active");
            $(".icofont-close").addClass("icofont-navigation-menu");
            $(".icofont-navigation-menu").removeClass("icofont-close");
            $(".mobile-nav-overly").css("display", "none");
        }
    });

    $('.mobile-nav .custom-control-input').attr('id', 'remember2');
    $(".mobile-nav .custom-control-label").attr('for', 'remember2')



    $('.custom-control-label').click(function (e) {
        e.stopPropagation();
    });

    $(".log a").click(function () {
        $(".log a").data('clicked', true);
    });
    $(document).on('click', '.dropdown-menu', function (e) {
        if (!$('.log a').data('clicked')) {
            e.stopPropagation();
        } else
            $(".log a").data('clicked', false);
    });


    $(".log-in").submit(function (e) {
        e.preventDefault();

        var f = $(this).find('.form-group'),
            ferror = false,
            emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

        f.children('input').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'checked':
                        if (!i.attr('checked')) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        if (!ferror) {
            var logusername = $(".email").val();
            var loguserpass = $(".password").val();
            jQuery.ajax({
                type: "POST",
                url: 'controller/userregister.php',
                dataType: 'json',
                data: {
                    functionname: 'loginuser',
                    arguments: [logusername, loguserpass]
                },

                success: function (data, textstatus) {
                    if (('error' in data)) {
                        alert("Invalid Email ID or Password");

                    } else {
                        if (data['role'] === 1 && data['success'] ==='success')
                            window.location.href = '/main-website/users.php';
                        else if(data['role'] === 2 && data['success'] ==='success')
                            window.location.href = '/main-website/admin/mbooking.php';
                    }
                }
            });
        }

    });
    
    



$(".book-reg-ister").submit(function (e) {
        e.preventDefault();

        var f = $(this).find('.form-group'),
            ferror = false,
            emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

        f.children('input').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'checked':
                        if (!i.attr('checked')) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        if (!ferror) {
            var logusername = $("#book-reg-email").val();
            var loguserpass = $("#book-reg-pass").val();
            jQuery.ajax({
                type: "POST",
                url: 'controller/userregister.php',
                dataType: 'json',
                data: {
                    functionname: 'loginuser',
                    arguments: [logusername, loguserpass]
                },

                success: function (data, textstatus) {
                    if (('error' in data)) {
                        alert("Invalid Email ID or Password");

                    } else {
                        if (data['role'] === 1 && data['success'] ==='success')
                            window.location.href = '/main-website/users.php';
                        else if(data['role'] === 2 && data['success'] ==='success')
                            window.location.href = '/main-website/admin/mbooking.php';
                    }
                }
            });
        }

    })




    
    
    $(".reg-ister").submit(function (e) {
        e.preventDefault();

        var f = $(this).find('.form-group'),
            ferror = false,
            emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

        f.children('input').each(function () { // run all inputs

            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                var pos = rule.indexOf(':', 0);
                if (pos >= 0) {
                    var exp = rule.substr(pos + 1, rule.length);
                    rule = rule.substr(0, pos);
                } else {
                    rule = rule.substr(pos + 1, rule.length);
                }

                switch (rule) {
                    case 'required':
                        if (i.val() === '') {
                            ferror = ierror = true;
                        }
                        break;

                    case 'minlen':
                        if (i.val().length < parseInt(exp)) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'email':
                        if (!emailExp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'checked':
                        if (!i.attr('checked')) {
                            ferror = ierror = true;
                        }
                        break;

                    case 'regexp':
                        exp = new RegExp(exp);
                        if (!exp.test(i.val())) {
                            ferror = ierror = true;
                        }
                        break;
                }
                i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        
        $(this).find('.custom-control').children('input').each(function () { // run all inputs
            var i = $(this); // current input
            var rule = i.attr('data-rule');

            if (rule !== undefined) {
                var ierror = false; // error flag for current input
                        if (!i.is(":checked")) {
                            ferror = ierror = true;
                }
                i.next().next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
            }
        });
        
        
          var mobile=document.getElementById('inputMobile').value;
  if ($("#inputMobile").val().length!=10 || $("#inputMobile").val() == "") {

         $(".valid-mob").html("Enter a valid phone number").show();
         ferror=true;
        }
    else {
        $(".valid-mob").html("").hide();
    }

        var pass=$("#password").val();
        var con_pass=$("#confirm-password").val();
        if(pass!=="" && con_pass!=="" && pass!==con_pass){
            ferror=true;
            $(".valid-con").html("Passwords don't match!").show();
        }
        else{
            if($(".valid-con").html()=="Passwords don't match!")
            $(".valid-con").html("").hide();
        }
        
        if (!ferror) {
            var fname = $("#first-name").val();
            var lname = $("#last-name").val();
            var email = $("#reg-email").val();
            var sub = $("#subscribe").is(":checked");
            jQuery.ajax({
                type: "POST",
                url: 'controller/userregister.php',
                dataType: 'json',
                data: {
                    functionname: 'registeruser',
                    arguments: [fname, lname, mobile, email, pass, sub]
                },

                success: function (data, textstatus) {
                    if (('error' in data)) {
                         alert("Email ID already present");

                    } else {
                       alert("Registered successfully Please login");
                        window.location.reload();
                    }
                }
            });
        }

    });




})(jQuery);


function registerEvent(eventID){
             $(".validate-team").hide();
              $(".valid-mob").hide();
              $(".validate-capname").hide();
              $(".validate-email").hide();
              ferror=false;
            var emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
            var eventTeamName = $('#'+ eventID +'-event-team-name').val();
            var eventCapName = $('#'+ eventID +'-event-captain-name').val();
            var eventEmail = $('#'+ eventID +'-event-reg-email').val();
            var eventMob = $('#'+ eventID +'-event-inputMobile').val();
            if(eventMob!="")
            {
                if(eventMob.length<10)
                {
                     $(".valid-mob").html("Enter a valid phone number").show();
                      ferror=true;
                }
            }else{
                 $(".valid-mob").html("Enter phone number").show();
                      ferror=true;
            }

        if(eventTeamName=="")
        {
             ferror=true;
             $(".validate-team").html("Please Team name").show();
        }if(eventCapName=="" ){
             ferror=true;
             $(".validate-capname").html("Please Captain name").show();
        }if(eventEmail=="" || !emailExp.test(eventEmail)){
            ferror=true;
             $(".validate-email").html("Please valid email ID").show();
        }

        if (!ferror) {
           
            jQuery.ajax({
                type: "POST",
                url: 'controller/eventregister.php',
                dataType: 'json',
                data: {
                    functionname: 'registerevent',
                    arguments: [eventTeamName, eventCapName, eventEmail, eventMob, eventID]
                },

                success: function (data, textstatus) {
                    if (('error' in data)) {
                        alert("Email ID already exist");
                        window.location.reload();

                    } else {
                        if (data['success'] ==='inserted')
                            alert("Registration Successful");
                             window.location.reload();
                    }
                }
            });
        }

}
