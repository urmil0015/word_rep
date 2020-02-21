<?php
/**
 * Implement theme metabox.
 *
 * @package ePortfolio
 */
if (!function_exists('eportfolio_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function eportfolio_add_theme_meta_box()
    {

        $screens = array('post', 'page');

        foreach ($screens as $screen) {
            add_meta_box(
                'eportfolio-theme-settings',
                esc_html__('Single Page/Post Layout Settings', 'eportfolio'),
                'eportfolio_render_theme_settings_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'eportfolio_add_theme_meta_box');


if ( ! function_exists( 'eportfolio_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function eportfolio_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$eportfolio_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'eportfolio_meta_box_nonce' );
		// Fetch Options list.
		$page_layout = get_post_meta($post_id,'eportfolio-meta-select-layout',true);
	?>
	<div id="eportfolio-settings-metabox-container" class="eportfolio-settings-metabox-container">
		<div id="eportfolio-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'eportfolio' ); ?></h4>
			<div class="eportfolio-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="eportfolio-row-content">
				         <label for="eportfolio-meta-checkbox">
				             <input type="checkbox" name="eportfolio-meta-checkbox" id="eportfolio-meta-checkbox" value="yes" <?php if ( isset ( $eportfolio_post_meta_value['eportfolio-meta-checkbox'] ) ) checked( $eportfolio_post_meta_value['eportfolio-meta-checkbox'][0], 'yes' ); ?> />
				             <?php _e( 'Check To Enable Featured Image On Single Page', 'eportfolio' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="eportfolio-meta-select-layout" class="eportfolio-row-title">
			                <?php _e( 'Single Page/Post Layout', 'eportfolio' )?>
			            </label>
			            <select name="eportfolio-meta-select-layout" id="eportfolio-meta-select-layout">
				            <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
				            	<?php _e( 'Content - Primary Sidebar', 'eportfolio' )?>
				            </option>
				            <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
				            	<?php _e( 'Primary Sidebar - Content', 'eportfolio' )?>
				            </option>
				            <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
				            	<?php _e( 'No Sidebar', 'eportfolio' )?>
				            </option>
			            </select>
			        </p>
			</div><!-- .eportfolio-row-content -->
		</div><!-- #eportfolio-settings-metabox-tab-layout -->
	</div><!-- #eportfolio-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'eportfolio_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function eportfolio_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['eportfolio_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['eportfolio_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$eportfolio_meta_checkbox =  isset( $_POST[ 'eportfolio-meta-checkbox' ] ) ? esc_attr($_POST[ 'eportfolio-meta-checkbox' ]) : '';
		update_post_meta($post_id, 'eportfolio-meta-checkbox', sanitize_text_field($eportfolio_meta_checkbox));

		$eportfolio_meta_select_layout =  isset( $_POST[ 'eportfolio-meta-select-layout' ] ) ? esc_attr($_POST[ 'eportfolio-meta-select-layout' ]) : '';
		if(!empty($eportfolio_meta_select_layout)){
			update_post_meta($post_id, 'eportfolio-meta-select-layout', sanitize_text_field($eportfolio_meta_select_layout));
		}
	}

endif;

add_action( 'save_post', 'eportfolio_save_theme_settings_meta', 10, 3 );