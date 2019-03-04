<?php

namespace Kntnt\Parallax_Images;

class Settings extends Abstract_Settings {

    /**
     * Returns the settings menu title.
     */
    protected function menu_title() {
        return __('Parallax Images', 'kntnt-parallax-images');
    }

    /**
     * Returns all fields used on the settings page.
     */
    protected function fields() {

        $fields['selector'] = [
            'type'        => 'text',
            'label'       => __('Selector', 'kntnt-parallax-images'),
            'description' => __("CSS/jQuery selector(s) for images that should have the parallax behaviour, e.g. <code>.parallax img</code>, <code>img.parallax</code>, <code>figure &gt; img</code> and <code>img[class*='parallax']</code>. Separate several CSS/jQuery selectors with comma, e.g. <code>.parallax img, img[class*='parallax']</code>. Please notice that you cannot use double quotation marks — only single quotation marks.", 'kntnt-parallax-images'),
            'filter-before' => 'stripslashes',
        ];

        $fields['submit'] = [
            'type' => 'submit',
        ];

        return $fields;

    }

}
