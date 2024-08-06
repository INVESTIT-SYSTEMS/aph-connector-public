// JavaScript Document
var div_top = $('.header-section').offset().top;

$(window).scroll(function () {
    var window_top = $(window).scrollTop() - 0;
    if (window_top > div_top) {
        if (!$('.header-section').is('.sticky')) {
            $('.header-section').addClass('sticky');
        }
    } else {
        $('.header-section').removeClass('sticky');
    }
});

// JavaScript Document
const navbarMenu = document.getElementById("navbar");
const burgerMenu = document.getElementById("burger");
const closeMenu = document.getElementById("close");
const overlayMenu = document.querySelector(".overlay");

// Show and Hide Navbar Function
const toggleMenu = () => {
    navbarMenu.classList.toggle("active");
    overlayMenu.classList.toggle("active");
};

// Collapsible Mobile Submenu Function
const collapseSubMenu = () => {
    navbarMenu
        .querySelector(".menu-dropdown.active .submenu")
        .removeAttribute("style");
    navbarMenu.querySelector(".menu-dropdown.active").classList.remove("active");
};

// Toggle Mobile Submenu Function
const toggleSubMenu = (e) => {
    if (e.target.hasAttribute("data-toggle") && window.innerWidth <= 1399) {
        e.preventDefault();
        const menuDropdown = e.target.parentElement;

        // If Dropdown is Expanded, then Collapse It
        if (menuDropdown.classList.contains("active")) {
            collapseSubMenu();
        } else {
            // Collapse Existing Expanded Dropdown
            if (navbarMenu.querySelector(".menu-dropdown.active")) {
                collapseSubMenu();
            }

            // Expanded the New Dropdown
            menuDropdown.classList.add("active");
            const subMenu = menuDropdown.querySelector(".submenu");
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        }
    }
};

// Fixed Resize Window Function
const resizeWindow = () => {
    if (window.innerWidth > 1399) {
        if (navbarMenu.classList.contains("active")) {
            toggleMenu();
        }
        if (navbarMenu.querySelector(".menu-dropdown.active")) {
            collapseSubMenu();
        }
    }
};

// Initialize Event Listeners
burgerMenu.addEventListener("click", toggleMenu);
closeMenu.addEventListener("click", toggleMenu);
overlayMenu.addEventListener("click", toggleMenu);
navbarMenu.addEventListener("click", toggleSubMenu);
window.addEventListener("resize", resizeWindow);



// Banner

$('.slider-for-banner').slick({
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '.slider-nav-banner'
});
$('.slider-nav-banner').slick({
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for-banner',
    dots: false,
    focusOnSelect: true,
    centerMode: true,
    centerPadding: '0',
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '0',
                slidesToShow: 2
            }
        }
    ]
});


$("#typed1").typed({
    strings: ["zarządzanie operacyjne", "transformacja cyfrowa", "zasoby ludzkie", "sales &amp; marketing", "zarządzanie strategiczne", "finanse"],
    typeSpeed: 100,
    startDelay: 0,
    backSpeed: 60,
    backDelay: 2000,
    loop: true,
    cursorChar: "|",
    contentType: 'html'
});

$("#typed2").typed({
    strings: ["zarządzanie operacyjne", "transformacja cyfrowa", "zasoby ludzkie", "sales &amp; marketing", "zarządzanie strategiczne", "finanse"],
    typeSpeed: 100,
    startDelay: 0,
    backSpeed: 60,
    backDelay: 2000,
    loop: true,
    cursorChar: "|",
    contentType: 'html'
});

$("#typed3").typed({
    strings: ["zarządzanie operacyjne", "transformacja cyfrowa", "zasoby ludzkie", "sales &amp; marketing", "zarządzanie strategiczne", "finanse"],
    typeSpeed: 100,
    startDelay: 0,
    backSpeed: 60,
    backDelay: 2000,
    loop: true,
    cursorChar: "|",
    contentType: 'html'
});

// collaborated
$('.collaborated-js').slick({
    autoplay: true,
    dots: true,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        }
    ]
});

// reviews
$('.reviews-js').slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        }
    ]
});

// blogs
$('.blogs-js').slick({
    autoplay: true,
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            }
        }
    ]
});


// tabs
$(document).ready(function () {
    $(".tab-content ul li a").click(function () {
        $('.tab-content ul li a').removeClass();
        $(this).addClass('select');
        var index = $('.tab-content ul li a').index($(this));
        $('.tab-details > div').hide();
        $('.tab-details > div').filter(':eq(' + index + ')').show();
    });
});

// country
$("#mobile_code").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
});

// categories
$('.slider-for-gallery').slick({
    autoplay: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.slider-for-gallery',
    dots: false,
    arrows: false,
    focusOnSelect: true
});

$('a[data-slide]').click(function (e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.slider-nav').slick('slickGoTo', slideno - 1);
});

//remove active class from all thumbnail slides
$('.action ul li').removeClass('slick-active');

//set active class to first thumbnail slides
$('.action ul li').eq(0).addClass('slick-active');

// On before slide change match active thumbnail to current slide
$('.slider-for-gallery').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var mySlideNumber = nextSlide;
    $('.action ul li').removeClass('slick-active');
    $('.action ul li').eq(mySlideNumber).addClass('slick-active');
});

// read more / less
$('.moreless-button').click(function () {
    $('.moretext').slideToggle();
    if ($('.moreless-button').text() == "Rozwiń") {
        $(this).text("Zwiń")
    } else {
        $(this).text("Rozwiń")
    }
});

// SMOOTH SCROLL
$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

// ANCHOR NAV
$(window).scroll(function () {
    var windscroll = $(window).scrollTop();
    var nextSection = $('.active').next('li').children('a').attr('href');

    if (document.body.scrollHeight - $(this).scrollTop() <= $(this).height()) {
        nextSection = $('#anchoremenu li:first-child a').attr('href');
        $('.back-top').addClass('bottom');
    } else {
        $('.back-top').removeClass('bottom');
    }

    if (windscroll >= 100) {
        $('.anchorsection').each(function (i) {
            if ($(this).position().top <= windscroll + 100) {
                $('#anchoremenu li.active').removeClass('active');
                $('#anchoremenu li').eq(i).addClass('active');
                $('.back-top').attr('href', nextSection);
            }
        });
    } else {
        $('#anchoremenu li.active').removeClass('active');
        $('#anchoremenu li:first').addClass('active');
        $('.back-top').attr('href', nextSection);
    }
}).scroll();


if(document.getElementById('image-input') != null)
{
    document.getElementById('image-input').addEventListener('change', (event) => {
        const input = event.target;
        const previewContainer = document.getElementById('image-preview-container');
        // Clear existing previews
        previewContainer.innerHTML = '';

        if (input.files) {
            for (const file of input.files) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    img.style.width = '200px';
                    img.style.height = 'auto';
                    img.style.marginTop = '10px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });
}

if(document.getElementById('file-input') != null)
{
    document.getElementById('file-input').addEventListener('change', (event) => {
        const input = event.target;
        const previewContainer = document.getElementById('image-file-container');
        // Clear existing previews
        previewContainer.innerHTML = '';

        if (input.files) {
            previewContainer.textContent = Array.from(input.files).map(file => file.name).join(', ');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const maxSelections = 3;
    const checkboxes = document.querySelectorAll('.competence-checkbox');

    const updateCheckboxState = () =>  {
        const checkedCount = document.querySelectorAll('.competence-checkbox:checked').length;
        if (checkedCount >= maxSelections) {
            checkboxes.forEach(box => {
                if (!box.checked) {
                    box.disabled = true;
                }
            });
        } else {
            checkboxes.forEach(box => {
                box.disabled = false;
            });
        }
    }
    updateCheckboxState();

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCheckboxState);
    });
});

document.addEventListener('DOMContentLoaded', function () {

    const maxSelectionsIndustry = 3;
    const checkboxes = document.querySelectorAll('.industry-checkbox');

    const updateCheckboxState = () =>  {
        const checkedCount = document.querySelectorAll('.industry-checkbox:checked').length;
        if (checkedCount >= maxSelectionsIndustry) {
            checkboxes.forEach(box => {
                if (!box.checked) {
                    box.disabled = true;
                }
            });
        } else {
            checkboxes.forEach(box => {
                box.disabled = false;
            });
        }
    }
    updateCheckboxState();

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateCheckboxState);
    });
});


