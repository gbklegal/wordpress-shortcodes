<?php

/**
 * Note: Correct the trusted shops URL if necessary.
 */

/**
 * Trusted Shops Logo shortcode
 *
 * @param string|int $image_size - optional (Default: 90)
 * @param string $url - optional (Default: link to ratings)
 * @param bool $wrap_p - optional (Default: true)
 *
 * @return string
 */
function trusted_shops_logo_shortcode($attr): string
{
    $attachment_id = 28854;
    $image_size = $attr['size'] ?? 90;
    $url =
        $attr['url'] ??
        'https://www.trustedshops.de/bewertung/info_X39360A1E1D1FAF3F0FB4F0C4C157560D.html';
    // $target = $attr['target'] ?? '_blank'; // enable if required
    // $rel = $attr['rel'] ?? 'noopener noreferrer nofollow'; // enable if required
    $wrap_p = $attr['wrap_p'] ?? true;

    // check if image size string contains a word or an integer
    if ((int) $image_size === 0) {
        $size = $image_size;
    } else {
        $size = [$image_size];
    }

    // content start
    $content = '';

    // wrap the whole content with an paragraph tag if needed
    if ($wrap_p === true) {
        $content .= '<p>';
    }

    // wrap image with an anchor tag
    $content .=
        '<a href="' .
        $url .
        '" rel="noopener noreferrer nofollow" target="_blank">';

    // image as HTML string or a empty string if failed
    $content .= wp_get_attachment_image($attachment_id, $size);

    // close wrapper (anchor tag)
    $content .= '</a>';

    // close wrapper (paragraph tag)
    if ($wrap_p === true) {
        $content .= '</p>';
    }

    // return the image with the anchor (and p) tag wrapper
    return $content;
}
add_shortcode('trusted_shops_logo', 'trusted_shops_logo_shortcode');
