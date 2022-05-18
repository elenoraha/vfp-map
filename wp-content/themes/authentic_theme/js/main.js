(function ($) {
  /*  - ● Animation
  ❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */
  var elements;
  var windowHeight;

  function init() {
    elementsRight = document.querySelectorAll('.hidden-right');
    elementsBottom = document.querySelectorAll('.hidden-bottom');
    elementsLeft = document.querySelectorAll('.hidden-left');
    windowHeight = window.innerHeight - 50;
  }

  function checkPosition() {
    for (var i = 0; i < elementsRight.length; i++) {
      var elementRight = elementsRight[i];
      var positionFromTop = elementsRight[i].getBoundingClientRect().top;

      if (positionFromTop - windowHeight <= 0) {
        elementRight.classList.add('slide-in-right');
        elementRight.classList.remove('hidden-right');
      }
    }
    for (var i = 0; i < elementsLeft.length; i++) {
      var elementLeft = elementsLeft[i];
      var positionFromTop = elementsLeft[i].getBoundingClientRect().top;

      if (positionFromTop - windowHeight <= 0) {
        elementLeft.classList.add('slide-in-left');
        elementLeft.classList.remove('hidden-left');
      }
    }
    for (var i = 0; i < elementsBottom.length; i++) {
      var elementBottom = elementsBottom[i];
      var positionFromTop = elementsBottom[i].getBoundingClientRect().top;

      if (positionFromTop - windowHeight <= 0) {
        elementBottom.classList.add('slide-in-bottom');
        elementBottom.classList.remove('hidden-bottom');
      }
    }
  }

  window.addEventListener('scroll', checkPosition);
  window.addEventListener('resize', init);

  init();
  checkPosition();
  
  /*  - ● AJAX MAP
  ❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱❱ */

  function load_candidates($id_state) {
    var str = '&idState=' + $id_state + '&action=load_candidates';
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: ajax_posts.ajaxurl,
      data: str,
      success: function (data) {
        var $data = $(data);
        if ($data.length) {
          $('#map-usa--states-data').html($data[0].candidates);
          $('.map-usa--state-title').html($data[0].name);
          $('.map-usa--title-wrapper').addClass('fadeIn--map');
          $('.map-usa--senators').addClass('fadeIn--map');
          $('.map-usa--title-wrapper a').attr('href', $data[0].link);
          $('.map-usa--title-wrapper a').attr('data-has-active-election', $data[0].has_active_election);
          $('.map-usa--election-date').attr('data-has-active-election', $data[0].has_active_election);

          setTimeout(function () {
            $('.map-usa--title-wrapper').removeClass('fadeIn--map');
            $('.map-usa--senators').removeClass('fadeIn--map');
          }, 1100);
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
      }
    });

    return false;
  }

  $("[class*='link-state--']").on('click', function (evt) {
    evt.preventDefault();
    load_candidates(this.getAttribute('class'));
  });

  $('#states-mobile').on('change', function (e) {
    load_candidates(this.value);
  })

  var state_id;
  if (state_id = $('.content-area.news').attr('data-preload-state')) {
    load_candidates(state_id);
  }

  /* COMPONENT: FEATURED-CTA */
  $(".fcta [class*='link-state--']").on("click", function (evt) {
    evt.preventDefault();
    parameter = this.getAttribute('class');
    link = $('.fcta--cta_button a').attr('href');
    window.location = link + '?state_id=' + parameter.replace('link-state--', '');
  });


})(jQuery);