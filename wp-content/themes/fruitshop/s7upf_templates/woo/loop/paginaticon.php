<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if(!isset($wp_query)) global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) {
    return;
}
if(!isset($paged)) $paged = get_query_var( 'paged' );
?>
<nav class="woocommerce-pagination pagibar text-center">
    <?php
    echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
        'format'       => '',
        'add_args'     => false,
        'current'      => max( 1, $paged ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '<i class="icon ion-ios-arrow-thin-left"></i>',
        'next_text'    => '<i class="icon ion-ios-arrow-thin-right"></i>',
        'type' => 'plain',
        'end_size'     => 3,
        'mid_size'     => 3,
    ) ) );
    ?>
</nav>
