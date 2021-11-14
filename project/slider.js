


$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
});


//ส่วนของข้อเสนอที่น่าสนใจ และ การจัดการเที่ยวบิน
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 15,
    nav: false,
    responsive: {
        0: {
            items: 1
        },

    }
})

$(".owl-prev").removeAttr("style");