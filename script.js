// Couleur de fond changeant avec le scroll

var $nav = $("#menu");

$(function () {
    $(document).scroll(function () {
      $nav.toggleClass("scrolled_mediaQueries", $(this).scrollTop() > 20 && window.matchMedia("(max-width: 700px)").matches);
      $nav.toggleClass("scrolled", $(this).scrollTop() > 100 && window.matchMedia("(min-width: 700px)").matches);
      });
    

    $nav.click(function() {
      $nav.toggleClass("background");
    });
  }
);
