jQuery(document).ready(function ($) {

    // For each image that use this plugin…
    $(kntnt_parallax_images.selector).each(function () {

        const img = this;
        const $img = $(img);

        let image_height;
        let scroll_length;

        // Set background image to the same as the foreground image,
        // and keep the foreground image for semantic correctness.
        $img.css({
            "background-image": "url(" + img.src + ")",
            "background-size": "cover",
            "background-position": "center",
        });

        // When the image is complete loaded, this plugin must be setup.
        // To avoid racing condition, we first add an eventlistener for
        // "on load" that will be called only once, and then check if that
        // event already has been fired.
        $img.one("load", function () {
            setup();
        });
        if (img.complete) setup();

        // On resize, setup everything again.
        $(window).resize(function () {
            setup();
        });

        // On scroll, update image position.
        $(window).scroll(function () {
            updateImagePosition();
        });

        // Setup "constants", image CSS and move image.
        function setup() {

            // Restore image to its natural height.
            $img.css({
                "height": "auto",
                "width": "auto",
            });

            // Calculate the new image height.
            image_height = img.height * kntnt_parallax_images.percent_of_height / 100;

            // Calculate the number of pixels an image travels from showing to
            // disappearing when scrolled through an entire screen.
            scroll_length = $(window).height() + image_height;

            // Hide the foreground image, so only the background image is
            // visible.
            $img.css({
                "height": "0px",
                "width": img.width,
                "padding": "0px",
                "padding-top": image_height,
            });

            updateImagePosition();

        }

        // Calculate and set the current background-position-y.
        function updateImagePosition() {

            // How far we scrolled.
            let top = $img.offset().top - $(window).scrollTop();
            let scroll_factor = 100 * (top + image_height) / scroll_length;
            scroll_factor = Math.min(Math.max(scroll_factor, 0), 100);

            // Move image.
            $img.css("background-position", "center " + scroll_factor + "%");

        }

    });

});