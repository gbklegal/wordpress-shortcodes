<?php

/**
 * Provides an image for download either by the ID or the URL.
 *
 * @param array $atts The shortcode attributes.
 * - @var int|string ID/URL from the image. The image must have been uploaded via WordPress to work properly.
 *
 * @return string Returns the HTML content on success, empty string otherwise.
 */
function shortcode_download_image($atts)
{
    $atts = $atts ?: [null];
    $attachment_id = $atts[0] ?: null;

    if (is_null($attachment_id)) {
        return '';
    }

    if (!is_numeric($attachment_id)) {
        $attachment_id = get_attachment_id_from_url($attachment_id);
    }

    $image = wp_get_attachment_image($attachment_id, 'large');
    $image_url = wp_get_attachment_url($attachment_id);
    $label = wp_get_attachment_caption($attachment_id);
    $meta_data = wp_get_attachment_metadata($attachment_id);
    $file_size = size_format($meta_data['filesize'] ?? null);
    $file_type = pathinfo($meta_data['file'], PATHINFO_EXTENSION);
    $file_type_upper = strtoupper($file_type);
    $width = $meta_data['width'];
    $height = $meta_data['height'];

    $dimensions = '';

    if ($width > 0 && $height > 0) {
        $dimensions = <<<HTML_CONTENT
<div>Maße (px)</div>
<div>{$width} x {$height}</div>
HTML_CONTENT;
    }

    $the_file_size = '';

    if (false !== $file_size) {
        $the_file_size = <<<HTML_CONTENT
<div>Dateigröße</div>
<div>{$file_size}</div>
HTML_CONTENT;
    }

    return <<<HTML_CONTENT
<div class="download-image-container">
    <figure class="image-container">
        {$image}
        <figcaption>{$label}</figcaption>
    </figure>
    <div class="image-details">
        <div>Dateityp</div>
        <div>{$file_type_upper}</div>
        {$dimensions}
        {$the_file_size}
    </div>
    <div class="image-download">
        <a href="{$image_url}" download>
            <i class="fa fa-download"></i>
            Herunterladen
        </a>
    </div>
</div>
HTML_CONTENT;
}

add_shortcode('download_image', 'shortcode_download_image');
