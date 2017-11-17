(function(document) {
  jQuery(document).ready(function() {
    jQuery('.number-svg').waypoint(function() {
      var $elm = jQuery(this.element);
      $elm.find('.js-underline').addClass('animate-path');
      $elm.find('.js-number').addClass('animate-path-fill');
    }, {
      offset: '80%'
    });
  });
})(document);