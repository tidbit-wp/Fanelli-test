/**
 *This is custom jQuery file of current Theme 
 *
 * 
 *
 * @package WordPress
 * @subpackage Rider
 * @since Rider 1.0
 */
 function checkPosition() {
  if (window.matchMedia('(max-width: 767px)').matches) {
    $('.trail-book ').addClass('nav-item');
    $('.sub-menu li').addClass('nav-item');
  } else {
    $('.trail-book ').removeClass('nav-item');
    $('.sub-menu li').removeClass('nav-item');
  }
}
jQuery(document).ready(function($){ 

 
  // $("<br>").insertAfter('#loginform .login-username label');
  // $("<br>").insertAfter('#loginform .login-password label');
  $("#loginform .login-submit input[type='submit']").addClass('btn-submit');
  $("#loginform .login-username input[type='text']").addClass('form-control');
  $("#loginform .login-password input[type='password']").addClass('form-control');
  $('<a class="forget-pass" style="" href="/wp-login.php?action=lostpassword">Lost your password?</a>').insertAfter('#loginform .login-submit');
  
  if($('.navbar #menu-main-menu li').hasClass('menu-item-has-children')){
    $('li.menu-item-has-children').addClass('dropdown-toggle');
    $('ul.sub-menu').addClass('dropdown-menu');
    $('ul.sub-menu li').addClass('dropdown-item ');
  }

    

    var pageURL = $(location).attr("href");
    var numbersArray = pageURL.split('?');
    if(numbersArray[1]=='faq0'){
        $('html, body').animate({
            scrollTop: $("#accordion").offset().top
        }, 900);
        $('#collapse0').trigger('click');
    }
    if(numbersArray[1]=='faq2'){
        $('html, body').animate({
            scrollTop: $("#accordion").offset().top
        }, 900);
        $('#collapse2').trigger('click');
    }
    
    $('.navbar-toggler').on('click' , function(){
        
        if($(".navbar-collapse").hasClass("show")){
            $(".navbar-light .navbar-toggler-icon").css('border-bottom','1px solid #FFCE33');
        }
        else{
            $(".navbar-toggler-icon").css('border-bottom','0');
        }
    });
    // Addimg active class on current Menu Item
    $('.nav-link').on('click', function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
    $('.navbar-toggler').on('click', function(){
        $('.navbar ').toggleClass('top')
    });
    

    // Adding and remove Active class from sidemenu
    $("body").on("click", ".text h3 span", function(event){
        var ids= $(this).attr('ids');
         $('.thumb_class_'+ids).toggleClass('like-btn');
       });

    // Filter Code using AJAX
    $('.clclhear').click(function(){
    
        var readmore = $(this).attr("value");  
    
        $.ajax({
    
                type :'POST',
    
                url : frontend_ajax_object.ajaxurl,
    
                data : {
    
                    'action' : 'archive_called', 
                    'articlevalue' : readmore
    
                },
    
                success: function (result) {
    
                    $('.hereadd').html(result);
    
                },
                error: function(error){
                   console.log(error);
                }  
    
            });
    
    });
    // if($('.dropdown-menu').hasClass('show')){
    //     $('button.btn-transparent').css('background-color', '#FFCE33')
    // }

});


    
                            $(document).ready(function(){
  
  $(".carousel").carousel({
    //ปิดการเล่น auto
    interval: 5000,
    pause: true
  });
  
  $( ".carousel .carousel-inner" ).swipe( {
    swipeLeft: function ( event, direction, distance, duration, fingerCount ) {
      this.parent( ).carousel( 'next' );
    },
    swipeRight: function ( ) {
      this.parent( ).carousel( 'prev' );
    },
    threshold: 0,
    tap: function(event, target) {
      // get the location: in my case the target is my link
      //    window.location = $(this).find('.carousel-item.active a').attr('href');
    },
    //เอา  a ออกถ้าต้องการให้ slide ที่เป็น tag a สามารถคลิกได้
    excludedElements:"label, button, input, select, textarea, .noSwipe"
  } );
  
  $('.carousel .carousel-inner').on('dragstart', 'a', function () {
    return false;
  });  
  
});

