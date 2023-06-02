<?php

/**
 * Note: Correct the aliases and URLs if necessary.
 */

/**
 * CTA Button shortcode
 *
 * @param string $value
 * @param string $link_to Optional. (Default: order)
 * @param string $url Optional. (Default: <empty string>) this overwrites link_to
 * @param string $class Optional. (Default: btn btn-theme-primary btn-full) this overwrites the default classes
 * @param string $add_class Optional. (Default: <empty string>)
 * @param bool $wrap_p Optional. (Default: true)
 *
 * @return string
 */
function cta_button_shortcode($attr): string
{
    $value = $attr['value'] ?? '';
    $link_to = $attr['link_to'] ?? 'order';
    $url = $attr['url'] ?? '';
    $class = $attr['class'] ?? 'btn btn-primary btn-full';
    $add_class = $attr['add_class'] ?? '';
    $wrap_p = $attr['wrap_p'] ?? true;

    $links = [
        'order' => '/bussgeldbescheid-jetzt-pruefen-lassen/',
        'quickcheck' => '/quickcheck/',
    ];

    // check if url is empty and link to key exists
    if (empty($url) && array_key_exists($link_to, $links)) {
        $url = home_url($links[$link_to]);
    }

    // check if there a classes to be added
    if (!empty($add_class)) {
        $class .= ' ' . $add_class;
    }

    // content start
    $content = '';

    // wrap the whole content with an paragraph tag if needed
    if ($wrap_p === true) {
        $content .= '<p>';
    }

    // link
    $content .=
        '<a class="' . $class . '" href="' . $url . '">' . $value . '</a>';

    // close wrapper (paragraph tag)
    if ($wrap_p === true) {
        $content .= '</p>';
    }

    // return the link (with the p tag wrapper)
    return $content;
}

add_shortcode('cta_button', 'cta_button_shortcode');
