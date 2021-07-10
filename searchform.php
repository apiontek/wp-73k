<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$seventythreek_unique_id = wp_unique_id( 'search-form-' );

$seventythreek_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $seventythreek_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form flex-fill flex-sm-grow-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="d-flex flex-nowrap">
    <label id="<?php echo esc_attr( $seventythreek_unique_id ) . '-label'; ?>" for="<?php echo esc_attr( $seventythreek_unique_id ); ?>" aria-hidden class="form-label d-none"><?php _e( 'Search&hellip;', 'seventythreek' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
    <input type="search" id="<?php echo esc_attr( $seventythreek_unique_id ); ?>" class="form-control me-2 tek-search-input" value="<?php echo get_search_query(); ?>" name="s" aria-labelledby="<?php echo esc_attr( $seventythreek_unique_id ) . '-label'; ?>" placeholder="Search blog&hellip;" />
    <button type="submit" class="btn btn-outline-light" title="Search">
      <?php echo svg_icon_use('mdi-magnify', 'icon baseline'); ?>
    </button>
  </div>
</form>
