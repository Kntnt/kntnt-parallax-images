(function ($) {

  // Extend jQuery with the parallax function.
  $.fn.parallax = function () {

    // How many percentage of the original height will be shown.
    var percent_of_height = 50;

    // For each image that use this plugin…
    return this.filter('img').each(function () {

      var img = this;
      var $img = $(img);

      var image_height;
      var scroll_length;

      // Set background image to the same as the foreground image,
      // but keep it for sematic correctness.
      $img.css({
        'background-image': 'url(' + img.src + ')',
        'background-position': 'center',
        'background-size': 'cover',
      });

      // When the image is complete loaded, this plugin must be setup.
      // To avoid racing condition, we first add an eventlistener for
      // "on load" that will be called only once, and then check if that
      // event already has been fired.
      $img.one('load', function () {
        setup();
      });
      if (img.complete) setup();

      // Setup "constants", image CSS and move image.
      function setup() {

        // Restore image to its natural height.
        $img.css({
          'height': 'auto',
          'width': 'auto',
        });

        // Calculate the new image height.
        image_height = img.height * percent_of_height / 100;

        // Calculate the number of pixels an image travels
        // from showing to disappering when scrolled through
        // an enteire screen.
        scroll_length = $(window).height() + image_height;

        // Hide the foreground image, so
        // only the background image is visble.
        $img.css({
          'height': '0px',
          'width': img.width,
          'padding': '0px',
          'padding-top': image_height,
        });

        updateImagePosition();

      };

      // Calculate and set the current background-position-y.
      function updateImagePosition() {

        // How far we scrolled.
        var top = $img.offset().top - $(window).scrollTop();
        var scroll_factor = 100 * (top + image_height) / scroll_length;
        scroll_factor = Math.min(Math.max(scroll_factor, 0), 100);

        // Move image.
        $img.css('background-position', 'center ' + scroll_factor + '%');

      };

      // On scroll, update image position.
      $(window).scroll(function () {
        updateImagePosition();
      });

      // On resize, setup everything again.
      $(window).resize(function () {
        setup();
      });

    });

  };

}(jQuery));
