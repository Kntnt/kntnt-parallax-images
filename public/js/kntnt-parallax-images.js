/* JQuery plugin for image parallax
 *
 * Copyright © 2016 Thomas Barregren <thomas@barregren.se>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 * sell copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
*/

(function($) {
  
  // Extend jQuery with the parallax function.
  $.fn.parallax = function() {

    // How many percentage of the original height will be shown.
    var percent_of_height = 50;

    // For each image that use this plugin…
    return this.filter('img').each(function() {

      var img = this;
      var $img = $(img);

      var image_height;
      var scroll_length;
      
      // Set background image to the same as the foreground image,
      // but keep it for sematic correctness.
      $img.css({
        'background-image': 'url(' + img.src + ')',
        'background-position': 'center',
        'background-size': 'cover'
      });

      // When the image is complete loaded, this plugin must be setup.
      // To avoid racing condition, we first add an eventlistener for
      // "on load" that will be called only once, and then check if that
      // event already has been fired.
      $img.one('load', function() {
        setup();
      });
      if (img.complete) setup();


      // Setup "constants", image CSS and move image.
      function setup() {

        // Restore image to its natural height.
        $img.css({
          'height': 'auto',
          'width':  'auto',
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
          'height':      '0px',
          'width':       img.width,
          'padding':     '0px',
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
      $(window).scroll(function() {
        updateImagePosition();
      });

      // On resize, setup everything again.
      $(window).resize(function() {
        setup();
      });
      
    });
    
  };

}(jQuery));
