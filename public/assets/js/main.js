(function ($)
  { "use strict"

/* 1. Proloder */
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });


/* 2. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    };


/* 3. MainSlider-1 */
    function mainSlider() {
      var BasicSlider = $('.slider-active');
      BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BasicSlider.slick({
        autoplay: true,
        autoplaySpeed: 7000,
        dots: false,
        fade: true,
        arrows: false,
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-shift-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-shift-right"></i></button>',
        responsive: [{
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          }
        ]
      });

      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
          var $this = $(this);
          var $animationDelay = $this.data('delay');
          var $animationType = 'animated ' + $this.data('animation');
          $this.css({
            'animation-delay': $animationDelay,
            '-webkit-animation-delay': $animationDelay
          });
          $this.addClass($animationType).one(animationEndEvents, function () {
            $this.removeClass($animationType);
          });
        });
      }
    }
    mainSlider();



/* 4. Testimonial Active*/
  var testimonial = $('.h1-testimonial-active');
    if(testimonial.length){
    testimonial.slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplay:false,
        loop:true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ti-angle-right"></i></button>',
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false,
              arrow:false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows:false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows:false,
            }
          }
        ]
      });
    }


/* 5. Gallery Active */
    var client_list = $('.completed-active');
    if(client_list.length){
      client_list.owlCarousel({
        slidesToShow: 2,
        slidesToScroll: 1,
        loop: true,
        autoplay:true,
        speed: 3000,
        smartSpeed:2000,
        nav: false,
        dots: false,
        margin: 15,

        autoplayHoverPause: true,
        responsive : {
          0 : {
            items: 1
          },
          768 : {
            items: 2
          },
          992 : {
            items: 2
          },
          1200:{
            items: 3
          }
        }
      });
    }


/* 6. Nice Selectorp  */
  // var nice_Select = $('select');
  //   if(nice_Select.length){
  //     nice_Select.niceSelect();
  //   }

/* 7.  Custom Sticky Menu  */
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 245) {
        $(".header-sticky").removeClass("sticky-bar");
      } else {
        $(".header-sticky").addClass("sticky-bar");
      }
    });

    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      if (scroll < 245) {
          $(".header-sticky").removeClass("sticky");
      } else {
          $(".header-sticky").addClass("sticky");
      }
    });



/* 8. sildeBar scroll */
    $.scrollUp({
      scrollName: 'scrollUp', // Element ID
      topDistance: '300', // Distance from top before showing element (px)
      topSpeed: 300, // Speed back to top (ms)
      animation: 'fade', // Fade, slide, none
      animationInSpeed: 200, // Animation in speed (ms)
      animationOutSpeed: 200, // Animation out speed (ms)
      scrollText: '<i class="fas fa-level-up-alt"></i>', // Text for element
      activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });


/* 9. data-background */
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });


/* 10. WOW active */
    new WOW().init();

/* 11. Datepicker */

// 11. ---- Mailchimp js --------//
    function mailChimp() {
      $('#mc_embed_signup').find('form').ajaxChimp();
    }
    mailChimp();


// 12 Pop Up Img
    var popUp = $('.single_gallery_part, .img-pop-up');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }


// 13 Pop Up img Video
    var popUp = $('.popup-video');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'iframe',
        });
      }



/* ----------------- Other Inner page Start ------------------ */

  $('.popup-youtube, .popup-vimeo').magnificPopup({
    // disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  var review = $('.client_review_slider');
  if (review.length) {
    review.owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      dots: false,
      navText: [" <i class='ti-angle-left'></i> ", "<i class='ti-angle-right'></i> "],
      responsive: {
        0: {
          nav: false
        },
        768: {
          nav: false
        },
        991: {
          nav: true
        }
      }
    });
  }


  var product_slide = $('.product_img_slide');
  if (product_slide.length) {
    product_slide.owlCarousel({
      items: 1,
      loop: true,
      dots: true,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
      nav: true,
      dots: false,
      navText: [" <i class='ti-angle-left'></i> ", "<i class='ti-angle-right'></i> "],
      responsive: {
        0: {
          nav: false
        },
        768: {
          nav: false
        },
        991: {
          nav: true
        }
      }
    });
  }

  //product list slider
  var product_list_slider = $('.product_list_slider');
  if (product_list_slider.length) {
    product_list_slider.owlCarousel({
      items: 1,
      loop: true,
      dots: false,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 5000,
            nav: true,
            navText: ["next", "previous"],
            smartSpeed: 1000,
            responsive: {
              0: {
                margin: 15,
                nav: false,
                items: 1
              },
              600: {
                margin: 15,
                items: 1,
                nav: false
              },
              768: {
                margin: 30,
                nav: true,
                items: 1
              }
            }
          });
        }

        if ($('.img-gal').length > 0) {
          $('.img-gal').magnificPopup({
            type: 'image',
            gallery: {
              enabled: true
            }
          });
        }

        // niceSelect js code
        // $(document).ready(function () {
        //   $('select').niceSelect();
        // });

        // menu fixed js code
        $(window).scroll(function () {
          var window_top = $(window).scrollTop() + 1;
          if (window_top > 50) {
            $('.main_menu').addClass('menu_fixed animated fadeInDown');
          } else {
            $('.main_menu').removeClass('menu_fixed animated fadeInDown');
          }
        });

        // $('.counter').counterUp({
        //   time: 2000
        // });

        $('.slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          speed: 300,
          infinite: true,
          asNavFor: '.slider-nav-thumbnails',
          autoplay: true,
          pauseOnFocus: true,
          dots: true,
        });

        $('.slider-nav-thumbnails').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.slider',
          focusOnSelect: true,
          infinite: true,
          prevArrow: false,
          nextArrow: false,
          centerMode: true,
          responsive: [{
            breakpoint: 480,
            settings: {
              centerMode: false,
            }
          }]
        });


        // Search Toggle
        $("#search_input_box").hide();
        $("#search_1").on("click", function () {
          $("#search_input_box").slideToggle();
          $("#search_input").focus();
        });
        $("#close_search").on("click", function () {
          $('#search_input_box').slideUp(500);
        });

        //------- Mailchimp js --------//
        function mailChimp() {
          $('#mc_embed_signup').find('form').ajaxChimp();
        }
        mailChimp();

        //------- makeTimer js --------//
        function makeTimer() {

          //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
          var endTime = new Date("27 Sep 2019 12:56:00 GMT+01:00");
          endTime = (Date.parse(endTime) / 1000);
          var now = new Date();
          now = (Date.parse(now) / 1000);

          var timeLeft = endTime - now;

          var days = Math.floor(timeLeft / 86400);
          var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
          var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
          var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

          if (hours < "10") {
            hours = "0" + hours;
          }
          if (minutes < "10") {
            minutes = "0" + minutes;
          }
          if (seconds < "10") {
            seconds = "0" + seconds;
          }

          $("#days").html("<span>Days</span>" + days);
          $("#hours").html("<span>Hours</span>" + hours);
          $("#minutes").html("<span>Minutes</span>" + minutes);
          $("#seconds").html("<span>Seconds</span>" + seconds);

        }
      // click counter js
      (function() {
        window.inputNumber = function(el) {

          var min = el.attr('min') || false;
          var max = el.attr('max') || false;

          var els = {};

          els.dec = el.prev();
          els.inc = el.next();

          el.each(function() {
            init($(this));
          });

          function init(el) {

            els.dec.on('click', decrement);
            els.inc.on('click', increment);

            function decrement() {
              var value = el[0].value;
              value--;
              if(!min || value >= min) {
                el[0].value = value;
              }
            }

            function increment() {
              var value = el[0].value;
              value++;
              if(!max || value <= max) {
                el[0].value = value++;
              }
            }
          }
        }
      })();

      inputNumber($('.input-number'));
        setInterval(function () {
          makeTimer();
        }, 1000);


      $('.select_option_dropdown').hide();
      $(".select_option_list").click(function () {
        $(this).parent(".select_option").children(".select_option_dropdown").slideToggle('100');
        $(this).find(".right").toggleClass("fas fa-caret-down, fas fa-caret-up");
      });

      if ($('.new_arrival_iner').length > 0) {
        var containerEl = document.querySelector('.new_arrival_iner');
        var mixer = mixitup(containerEl);
      }


      $('.controls').on('click', function(){
        $(this).addClass('active').siblings().removeClass('active');
      });


/* ----------------- Other Inner page End ------------------ */



// Modal Activation
    $('.search-switch').on('click', function () {
      $('.search-model-box').fadeIn(400);
    });

    $('.search-close-btn').on('click', function () {
      $('.search-model-box').fadeOut(400, function () {
          $('#search-input').val('');
      });
    });

// Grid view and list View

    $(document).ready(function() {
      $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
      $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });

})(jQuery);

//MOJ JS IDE ODAVDE

$(document).ready(function (){
    $.ajax({
        url:"/shop/ajax",
        method:"GET",
        dataType:"json",
        success: function(data){
            getProducts(data);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
    if(document.getElementById("productsShop") != null || document.getElementById("cartBody") != null){
        getCartItems();
    }
    if(document.getElementById("analyticsGet") != null){
        printGetAnalytics();
    }



    $(document).on("click","#nav-home-tab",getNewest);
    $(document).on("click","#nav-home-tab-all",getAll);
    $(document).on("click","#nav-contact-tab",getPopular);
    $(document).on("change","#select1",sortFilter);
    $(document).on("change","#select2",sortFilter);
    $(document).on("keyup","#search",search);
    //LOGIN I REGISTER
    $(document).on("click","#logIn",userLogin);
    $(document).on("click","#register",userRegister);
    $(document).on("click","#logout",logoutUser);
    //ADD TO CART
    $(document).on("click",".addToCart",addToCart);
    $(document).on("click",".plus",quantityPlus);
    $(document).on("click",".minus",quantityMinus);
    //REMOVE FROM CART
    $(document).on("click",".remove",removeFromCart);
    //UPDATE PRODUCT
    $(document).on("change","#prodUpdate",getProductUpdate);
    //DELETE PRODUCT
    $(document).on("change","#prodDelete",getProductDelete);
    //UPDATE CATEGORY
    $(document).on("change","#categoryUpdate",categoryUpdate);
    //FILTER ANALYTICS
    $(document).on("change","#dateFrom",dateFilter);
    $(document).on("change","#dateTo",dateFilter);


})

function getProducts(data){

    var getProducts="";
    var sesija = $("#sesija").val();
    for(let p of data.products){
        getProducts+=`

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">

                        <div class="popular-img">
                            <img src="assets/img/gallery/${p.images[0].src}" alt="${p.title}">
                            `
                                if(sesija != "0"){

                                    getProducts+=` <div class="img-cap">
                                        <span><a href="#" class="addToCart" data-prodid="${p.id}">Add to cart</a></span>
                                    </div>`
                                }
                                else{
                                    getProducts+=` <div class="img-cap">
                                        <span><a href="/login">Login in order to purchase</a></span>
                                    </div>`
                                }

                getProducts+=`  <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>

                    <div class="popular-caption">
                        <h3><a href="details/${p.id}">${p.title}</a></h3>
                        <span>$ ${p.price}</span>
                    </div>
                </div>
            </div>

        `
    }
    $("#productsShop").html(getProducts);
}
function getNewest(data){

    $.ajax({
        url:"/shop/newest",
        method:"GET",
        dataType:"json",
        success: function(data){
            getProducts(data);
            //console.log(data);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function getPopular(data){

    $.ajax({
        url:"/shop/popular",
        method:"GET",
        dataType:"json",
        success: function(data){
            getProducts(data);
            //console.log(data);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}

function getAll(data){
    $.ajax({
        url:"/shop/ajax",
        method:"GET",
        dataType:"json",
        success: function(data){
            getProducts(data);
            //console.log(data);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function sortFilter(data){

    var sort = $("#select1").val();
    var filter = $("#select2").val();
    //console.log(sort,filter);
    if(sort==0 && filter==0){
        $.ajax({
            url:"/shop/ajax",
            method:"GET",
            dataType:"json",
            success: function(data){
                getProducts(data);
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        })
    }
    else{

        let getToken = document.getElementsByName('_token');
        let token;
        for(let el of getToken) {

            token = getToken[0].defaultValue;

        }

        $.ajax({
            url:"/shop/sortFilter",
            method:"POST",
            dataType:"json",
            data:{
                "sort":sort,
                "filter":filter,
                "_token":token
            },
            success: function(data){
                console.log(data);
                getProducts(data);
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        })
    }
}
function search(data){
    var search = $("#search").val();
    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    $.ajax({
        url:"/shop/search",
        method:"POST",
        dataType:"json",
        data:{
            "search":search,
            "_token":token
        },
        success: function(data){
            //console.log(data);
            getProducts(data);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
// LOGIN I REGISTER

function userLogin(e){
    e.preventDefault();
    var errorLog =[];
    var email = $("#emailLog").val();
    var pass = $("#passwordLog").val();

    var emailRegex=/^[a-zšđčćž,/.-_\d.!?]+@[a-z]+(.[a-z]+){1,2}$/;
    var passRegex=/^[\w\d]{4,10}$/;

    if(!(emailRegex.test(email))){
        errorLog.push("error");
        $("#emailLogLabel").css("color","red").show();
    }
    else{
        $("#emailLogLabel").hide();
    }

    if(!(passRegex.test(pass))){
        errorLog.push("error");
        $("#passLogLabel").css("color","red").show();
    }
    else{
        $("#passLogLabel").hide();

    }

    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    if(errorLog.length==0){
        $.ajax({
            "url":"/login",
            "method":"POST",
            "data":{
                "email":email,
                "pass":pass,
                "_token":token,
                "button":true
            },
            success: function(data){
                //console.log(data);
               window.location.href=data;
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr);
            }
        })
    }

}

$(".regLabels").hide();

function userRegister(e){
    e.preventDefault();
    var error = [];
    var name = $("#name").val();
    var lastName = $("#lastName").val();
    var phone = $("#phone").val();
    var address = $("#address").val();
    var city = $("#city").val();
    var emailRegister = $("#emailReg").val();
    var passRegister = $("#passReg").val();

    //ovde ide regex
    var nameReg =/^[A-ZŠĐČĆŽ][a-zšđčćž]{2,20}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{2,20})?$/;
    var phoneReg=/^[\d]{8,10}$/;
    var addressReg=/^[\w\d]+(\s[\w\d]+){1,4}$/;
    var cityReg=/^[A-ZŠĐČĆŽ][a-zšđčćž]+(\s[A-ZŠĐČĆŽ][a-zšđčćž]+){0,2}$/;
    var emailRegex=/^[a-zšđčćž,/.-_\d.!?]+@[a-z]+(\.[a-z]+){1,2}$/;
    var passRegex=/^.{4,10}$/;

    if(!(nameReg.test(name))){
        error.push("error");
        //$("#name").css("border","1px solid red");
        $("#nameLabel").css("color","red").show();
    }
    else{
        //$("#name").css("border","1px solid green");
        $("#nameLabel").hide();

    }

    if(!(nameReg.test(lastName))){
        error.push("error");
        $("#lastnameLabel").css("color","red").show();
    }
    else{
        $("#lastnameLabel").hide();

    }

    if(!(phoneReg.test(phone))){
        error.push("error");
        $("#phoneLabel").css("color","red").show();
    }
    else{
        $("#phoneLabel").hide();

    }

    if(!(addressReg.test(address))){
        error.push("error");
        $("#addressLabel").css("color","red").show();
    }
    else{
        $("#addressLabel").hide();

    }

    if(!(cityReg.test(city))){
        error.push("error");
        $("#cityLabel").css("color","red").show();
    }
    else{
        $("#cityLabel").hide();

    }

    if(!(emailRegex.test(emailRegister))){
        error.push("error");
        $("#emailLabel").css("color","red").show();
    }
    else{
        $("#emailLabel").hide();

    }

    if(!(passRegex.test(passRegister))){
        error.push("error");
        $("#passLabel").css("color","red").show();
    }
    else{
        $("#passLabel").hide();

    }


    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    if(error.length==0){
        $.ajax({
            "url":"/register",
            "method":"POST",
            "data":{
                "name":name,
                "lastName":lastName,
                "phone":phone,
                "address":address,
                "city":city,
                "emailReg":emailRegister,
                "passReg":passRegister,
                "_token":token,
                "button":true
            },
            success: function(data){
                console.log(data);
                if(data == "This email is taken!"){
                    alert(data);
                }
                else{
                    window.location.href=data;
                }


            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        });
    }

}

function logoutUser(){
    $.ajax({
        "url":"/logout",
        "method":"GET",
        success: function(data){
            //console.log(data);
            window.location.href=data;
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}

//CART --------------------------------------

function addToCart(e){
    e.preventDefault();
    var prodId = $(this).attr("data-prodid");
    var sesijaCart = $("#sesija").val();

    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    $.ajax({
        "url":"/addToCart",
        "method":"POST",
        "data":{
            "prodId":prodId,
            "sesijaCart":sesijaCart,
            "_token":token
        },
        success: function(data){
            alert("Added Successfully!");
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })

}

function getCartItems(){

    var sesijaCartGet = $("#sesija").val();
    let getToken = document.getElementsByName('_token');
    let token;
    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    $.ajax({
        "url":"/cart/ajax",
        "method":"POST",
        "data":{
            "sesijaCartGet":sesijaCartGet,
            "_token":token
        },
        success: function(dataCart){
            printCartItems(dataCart);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function printCartItems(dataCart){
    var cartItems = "";
    for(let c of dataCart){
        var newPrice=0;
        cartItems+=`

                    <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="assets/img/gallery/${c.product.images[0].src}" alt="${c.product.title}" />
                                        </div>
                                        <div class="media-body">
                                            <p>${c.product.title}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${c.product.price}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <span class="input-number-decrement"> <i class="ti-minus minus" data-prodcartid="${c.product.id}"></i></span>
                                        <input class="input-number quanitityVr" type="text" value="${c.quantity}" min="1" max="10">
                                        <span class="input-number-increment"> <i class="ti-plus plus" data-prodcartid="${c.product.id}"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="fullPrice">$ ${Math.round(c.product.price * c.quantity)} </h5>
                                </td>
                                <td>
                                    <a href="#" class="remove" data-prodcartidremove="${c.product.id}" style="color:#ff2020; font-weight: bold">Remove</a>
                                </td>
                    </tr>

        `
    }
    $("#cartBody").html(cartItems);

}

function quantityPlus(){

    var prodIdPlus = $(this).attr("data-prodcartid");
    let getToken = document.getElementsByName('_token');

    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    let currentButton = this;
    var praviElement = Number($(this).parent().prev().val()) + 1;
    $(this).parent().prev().val(praviElement)
    var singlePrice = $(this).parent().parent().parent().prev().find("h5")[0].innerHTML;
    $(this).parent().parent().parent().next().find("h5")[0].innerHTML = "$ "+Math.round(praviElement*singlePrice);


    $.ajax({
        "url":"/addToCartPlus",
        "method":"POST",
        "data":{
            "productPlus":prodIdPlus,
            "_token":token
        },
        success: function(dataPlus){

        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function quantityMinus(){

    var prodIdMinus = $(this).attr("data-prodcartid");
    let getToken = document.getElementsByName('_token');


    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    let currentButton = this;
    var praviElement = Number($(this).parent().next().val()) - 1;
    $(this).parent().next().val(praviElement)
    var singlePrice = $(this).parent().parent().parent().prev().find("h5")[0].innerHTML;
    $(this).parent().parent().parent().next().find("h5")[0].innerHTML = "$ "+Math.round(praviElement*singlePrice);

    $.ajax({
        "url":"/addToCartMinus",
        "method":"POST",
        "data":{
            "productMinus":prodIdMinus,
            "_token":token
        },
        success: function(dataPlus){

        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function removeFromCart(e){
    e.preventDefault();
    var prodIdRemove = $(this).attr("data-prodcartidremove");
    var sesijaCartRemove = $("#sesija").val();
    //console.log(prodIdRemove, sesijaCartRemove);
    let getToken = document.getElementsByName('_token');


    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    $.ajax({
        "url":"/removeFromCart",
        "method":"POST",
        "data":{
            "sesijaRemove":sesijaCartRemove,
            "prodIdRemove":prodIdRemove,
            "_token":token
        },
        success: function(){
            getCartItems()
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}
function getProductUpdate(){
    var prodIdUpdate = $("#prodUpdate").val();
    //console.log(prodIdUpdate);
    let getToken = document.getElementsByName('_token');


    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    if(prodIdUpdate != "0"){
        $.ajax({
            "url":"/admin/update/getProduct",
            "method":"GET",
            "data":{
                "idProdUpdate":prodIdUpdate,
                "_token":token
            },
            success: function(dataUpdate){

                    $("#titleUpdate").val(dataUpdate[0].title);
                    $("#priceUpdate").val(dataUpdate[0].price);
                    $("#catUpdate").val(dataUpdate[0].category_id);
                    $("#descriptionUpdate").val(dataUpdate[0].description);

            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        })
    }
    else{
        $("#titleUpdate").val("");
        $("#priceUpdate").val("");
        $("#catUpdate").val(0);
        $("#descriptionUpdate").val("");
    }
}

function getProductDelete(){
    var prodIdDelete = $("#prodDelete").val();
    //console.log(prodIdUpdate);
    let getToken = document.getElementsByName('_token');


    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    if(prodIdDelete != "0"){
        $.ajax({
            "url":"/admin/delete/getProduct",
            "method":"GET",
            "data":{
                "idProdDelete":prodIdDelete,
                "_token":token
            },
            success: function(dataDelete){

                console.log(dataDelete)
                var getDeleteProduct="";
                for(let p of dataDelete){
                    getDeleteProduct=`

                    <img src="/assets/img/gallery/${p.images[0].src}" alt="${p.title}"/>
                    <h3>${p.title}</h3>
                    `
                }
                $("#delProdGet").html(getDeleteProduct);
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        })
    }
    else{
        $("#delProdGet").html("");
    }
}
function categoryUpdate(){
    var catId = $("#categoryUpdate").val();
    //console.log(catId);
    let getToken = document.getElementsByName('_token');

    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }
    if(catId != "0"){
        $.ajax({
            "url":"/admin/update/getCategory",
            "method":"GET",
            "data":{
                "catId":catId,
                "_token":token
            },
            success: function(dataKatUpdate){

                $("#catNameUpdate").val(dataKatUpdate[0].name);
            },
            error: function(xhr, errType, errMsg){
                console.log(xhr.responseText);
            }
        })
    }
    else{
        $("#catNameUpdate").val("");
    }
}
//ANALYTICS
function printGetAnalytics(){
    $.ajax({
        "url":"/adminAnalytics/get",
        "method":"get",
        success:function (dataAnalytics){
            console.log(dataAnalytics);
            printAnalytics(dataAnalytics);
        },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    })
}

function printAnalytics(dataAnalytics){
    var analytics = `<table id="tableAnalytics"> <thead><tr><th>log</th><th>date created</th></tr></thead>`;

    for(let a of dataAnalytics){
        analytics+=`
            <tr>

            <td>${a.details}</td>
            <td>${a.created_at}</td>

            </tr>


        `
    }
    analytics+="</table>"
    $("#analyticsGet").html(analytics);
}
function dateFilter(){
    var dateFrom = $("#dateFrom").val();
    var dateTo = $("#dateTo").val();

    let getToken = document.getElementsByName('_token');

    for(let el of getToken) {

        token = getToken[0].defaultValue;

    }

    $.ajax({
       "url":"/adminAnalytics/filterDate",
       "method":"post",
       "data":{
           "dateFrom":dateFrom,
           "dateTo":dateTo,
           "_token":token
       },
       success:function (dataFilter){
           printAnalytics(dataFilter);
       },
        error: function(xhr, errType, errMsg){
            console.log(xhr.responseText);
        }
    });
}

//RESTRICT FUTURE DATE

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#dateTo').attr('max', maxDate);
});
