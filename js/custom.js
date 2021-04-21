jQuery(document).ready(function($){
    $('.banner-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll:1
    });

    $('.himachal-packages-slider').slick({
        centerMode: true,
        centerPadding: "32px",
        autoplaySpeed: 1500,
        speed: 1000,
        slidesToShow: 3,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1399.98,
                settings: {
                  arrows: true,
                  dots: false,
                  centerMode: true,
                  centerPadding: '32px',
                  slidesToShow: 3
                }
            },
            {
                breakpoint: 1199.98,
                settings: {
                  arrows: true,
                  dots: false,
                  centerMode: true,
                  centerPadding: '0',
                  slidesToShow: 2
                }
            },
            {
                breakpoint: 991.98,
                settings: {
                  arrows: true,
                  dots: false,
                  centerMode: true,
                  centerPadding: '22px',
                  slidesToShow: 2
                }
            },
            {
              breakpoint: 767.98,
              settings: {
                    arrows: true,
                    dots: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 575.98,
                settings: {
                      arrows: false,
                      dots: true,
                      centerMode: true,
                      centerPadding: '0',
                      slidesToShow: 1
                  }
            }
        ]
    });

    $('.login-modal a').attr('data-bs-toggle', 'modal')
    $('.login-modal a').attr('data-bs-target', '#LoginModal')

    $('.signup-modal a').attr('data-bs-toggle', 'modal')
    $('.signup-modal a').attr('data-bs-target', '#SignUpModal')

    /* Top Scroll Arrow */
    var mybutton = document.getElementById("myBtn");

    window.onscroll = function() {scrollFunction()};

    //console.log(document.documentElement);

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) 
        {
            mybutton.style.display = "block";
        } 
        else 
        {
            mybutton.style.display = "none";
        }
    };
    /* Top Scroll Arrow */

    setTimeout(function() {
        $('.load').delay(500).fadeOut('slow');
      }, 500);
});

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
};