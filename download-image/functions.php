<?php

/**
 * Add the following function is required for the shortcode to work properly. If it not already exists.
 */

/**
 * Get the attachment ID from the attachment URL.
 *
 * @param string $attachment_url The attachment URL.
 *
 * @return int The attachment ID.
 */
function get_attachment_id_from_url(string $attachment_url): int
{
    global $wpdb;

    $query = "SELECT ID FROM %i WHERE guid='%s' LIMIT 1";
    $prepared_query = $wpdb->prepare($query, [$wpdb->posts, $attachment_url]);
    $id = (int) $wpdb->get_var($prepared_query);

    return $id;
}
