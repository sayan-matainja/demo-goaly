var base_url = window.location.origin;


    // Close the sideNav when clicking outside of it
    $('body').on('click', function () {
        $('.sideNav').removeClass('open');
        $('.sideNavR').removeClass('open');
    });

    // Left SideNav toggle
    $('.nav-toggle').on('click', function (e) {
        $('.sideNav').toggleClass('open');
        e.stopPropagation();
        return false;
    });

    // Right SideNav toggle
    $('.nav-toggleR').on('click', function (e) {
        $('.sideNavR').toggleClass('open');
        e.stopPropagation();
        return false;
    });





                                /* Old togle functions*/
/** Left SideNav **/
// $(function () {
//   $('.nav-toggle').on('click', function (e) {
//     $('.sideNav').toggleClass('open');
    
//     e.stopPropagation();
//     return false;
//   });
  
//   $('*:not(.nav-toggle)').on('click', function () {
//     $('.sideNav').removeClass('open');
//   });
  
// });

// /** Right SideNav **/
// $(function () {
//   $('.nav-toggleR').on('click', function (e) {
//     $('.sideNavR').toggleClass('open');
    
//     e.stopPropagation();
//     return false;
//   });
  
//   $('*:not(.nav-toggleR)').on('click', function () {
//     $('.sideNavR').removeClass('open');
//   });
  
//});
                                   /*old toggle function end*/


/** Initialize Swiper **/

var swiper = new Swiper('.swiper-container', {
	autoHeight: true,
  	spaceBetween: 20,
	pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
	navigation: {
	nextEl: '.swiper-button-next',
	prevEl: '.swiper-button-prev',
  },
}); 
var swiper2 = new Swiper('.swiper-container2', {
	slidesPerView: 2,
    spaceBetween: 20,
	freeMode: true,
}); 

/** $('.swiper-container').each(function(){
   var mySwiper = new Swiper(this, {      
	  autoHeight: true,
      spaceBetween: 20,
	  pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      nextButton: $(this).find('.swiper-button-next')[0],
      prevButton: $(this).find('.swiper-button-next')[0],
	   slidesPerView: 3,
   });
}); **/
$(document).on('click', '.isLogin', function () {
        const target = $(this).data('target'); 
        
        getUserAndRedirect(target); 
});



    function getUserAndRedirect(target) {
        $.ajax({
            url: base_url + '/getUser',
            method: 'GET',
            success: function (response) {
                if (response === '') {
                    Swal.fire({
                    title: '<span id="popUpTitle">'+translations.pleaseLogin +'</span>',
                    icon: "info",
                    showCancelButton: true, // Show the cancel button
                    confirmButtonText: '<span id="positiveTxt">'+translations.Login +'</span>', 
                    cancelButtonText:  '<span id="negativeTxt">'+translations.cancel +'</span>',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace(base_url + '/login');
                        } else if (result.isDismissed) {
                            console.log('Cancelled');
                        }
                    });
                } else {
                    window.location.href = target; 
                }
            }
        });
    }