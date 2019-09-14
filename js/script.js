jQuery.fn.swapWith = function(to) {
  return this.each(function() {
    var copy_to = $(to).clone(true);
    var copy_from = $(this).clone(true);
    $(to).replaceWith(copy_from);
    $(this).replaceWith(copy_to);
  });
};

if ($(window).width() < 1023) {
  $('.page-nav').swapWith('.page > i');
}

$('.faq-item div').on('click', function() {
  $('.faq-item div').not(this).parent().removeClass('active').find('span').slideUp(300);
  if (!$(this).parent().hasClass('active')) {
    $(this).parent().addClass('active').find('span').slideDown(300);
  } else {
    $(this).parent().removeClass('active').find('span').slideUp(300);
  }
});

$('.faq-pn ul li a').on('click', function() {
  $('.faq-item div').parent().removeClass('active').find('span').fadeOut(0);
  var i = $(this).data('fill');
  $('.faq-pn ul li a').removeClass('active');
  $(this).addClass('active');
  if (i == '0') {
    $('.faq-item').fadeIn(0);
  } else {
    $('.faq-item').fadeOut(0);
    $('.faq-'+i).fadeIn(0);
  }
});

$('.post-cat a').on('click', function() {
  var i = $(this).data('fill');
  $('.post-cat a').removeClass('active');
  $(this).addClass('active');
  if (i == '0') {
    $('.post-bc a').fadeIn(0);
  } else {
    $('.post-bc a').fadeOut(0);
    $('.post-'+i).fadeIn(0);
  }
});

$('.copy').on('click', function() {
  var $temp = $('<input>');
  $('body').append($temp);
  $temp.val($(this).prev('p').text()).select();
  document.execCommand('copy');
  $temp.remove();
});

$('.head-humb').on('click', function() {
  $('.head-humb, .head ul').toggleClass('open');
});

$(window).scroll(function(){
  if ($(this).scrollTop() > 50) {
    $('.head').addClass('fix');
  } else {
    $('.head').removeClass('fix');
  }
});

$('body').delegate('.mfp-close', 'click', function() {
  $.magnificPopup.close();
});

$(document).ready(function() {

  $('.page-nav div').stick_in_parent({
    offset_top: 70
  });

  if(!$('.hit-bc').lenght){
    $('.hit-bc').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      swipeToSlide: true,
      arrows: true,
      dots: true,
      infinite: true,
      responsive: [
      {
        breakpoint: 1023,
        settings: 'unslick'
      }
      ]
    });
  }

  $('.rev-rec span a').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: true
    }
  });

  $('.open-modal').magnificPopup({
    type: 'ajax',
    fixedContentPos: true,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in',
    callbacks: {
      beforeOpen: function() { $('html').addClass('mfp-helper'); },
      open: function() {
        $('header').css('overflowY', 'scroll');
      },
      close: function() {
        $('header').css('overflowY', 'initial');
        $('html').removeClass('mfp-helper');
      }
    }
  });

  $('.cst form').ajaxForm({
    success: function(formData, jqForm, options){
      $('.cst form').prepend('<div class="suc">Вы успешно отправили запрос, в ближайшее время наши специалисты свяжутся с вами для консультации по номеру <a href="tel:84951502737">+8 495 150 27 37<a></div>');
      $('.suc').fadeIn(300);
      setTimeout(function () {
        $('.suc').fadeOut(300);
        $('.cst form')[0].reset();
      }, 8000);
      setTimeout(function () {
        $('.suc').remove();
      }, 8300);
    }
  });

  $('.dep form').ajaxForm({
    success: function(formData, jqForm, options){
      $('.dep form').prepend('<div class="suc">Вы успешно отправили запрос, в ближайшее время наши специалисты свяжутся с вами для консультации по номеру <a href="tel:84951502737">+8 495 150 27 37<a></div>');
      $('.suc').fadeIn(300);
      setTimeout(function () {
        $('.suc').fadeOut(300);
        $('.dep form')[0].reset();
      }, 8000);
      setTimeout(function () {
        $('.suc').remove();
      }, 8300);
    }
  });

  $('.foot-sub form').ajaxForm({
    success: function(formData, jqForm, options){
      $('.foot-sub form').prepend('<div class="suc">Подписка оформлена</div>');
      $('.suc').fadeIn(300);
      setTimeout(function () {
        $('.suc').fadeOut(300);
        $('.foot-sub form')[0].reset();
      }, 8000);
      setTimeout(function () {
        $('.suc').remove();
      }, 8300);
    }
  });

  $('input[name=phone]').mask('+7 (999) 999-99-99');

});


