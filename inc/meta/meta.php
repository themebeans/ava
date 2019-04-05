<?php
/**
 * The file is for display and output the theme's custom post meta.
 *
 * @package     Ava
 * @link        https://themebeans.com/themes/ava
 */

/**
 * Add metaboxes.
 *
 * @param array $meta_box With metabox id, title, callback, and args elements.
 */
function ava_add_meta_box( $meta_box ) {
	if ( ! is_array( $meta_box ) ) {
		return false;
	}

	add_meta_box( $meta_box['id'], $meta_box['title'], 'ava_metabox_callback', $meta_box['page'], $meta_box['context'], $meta_box['priority'], $meta_box );
}

/**
 * Get post meta in a callback
 *
 * @param WP_Post $post    The current post.
 * @param array   $meta_box With metabox id, title, callback, and args elements.
 */
function ava_metabox_callback( $post, $meta_box ) {
	return ava_create_meta_box( $post, $meta_box['args'] );
}

/**
 * Create metaboxes
 *
 * @param WP_Post $post    The current post.
 * @param array   $meta_box With metabox id, title, callback, and args elements.
 */
function ava_create_meta_box( $post, $meta_box ) {

	if ( ! is_array( $meta_box ) ) {
		return false;
	}

	wp_nonce_field( basename( __FILE__ ), 'ava_meta_box_nonce' );

	echo '<table class="index-meta-table form-table">';

	foreach ( $meta_box['fields'] as $field ) {
		// GET DATA FROM POST
		$meta = get_post_meta( $post->ID, $field['id'], true );
		echo '<tr><th><label for="' . $field['id'] . '" class="' . $field['id'] . '"><strong>' . $field['name'] . '</strong>
              <span>' . $field['desc'] . '</span></label></th>';

		switch ( $field['type'] ) {
			case 'text':
				echo '<td><input type="text" name="ava_meta[' . $field['id'] . ']" id="' . $field['id'] . '" value="' . ( $meta ? $meta : $field['std'] ) . '" size="30" /></td>';
				break;

			case 'textarea':
				echo '<td><textarea name="ava_meta[' . $field['id'] . ']" id="' . $field['id'] . '" rows="7" cols="5">' . ( $meta ? $meta : $field['std'] ) . '</textarea></td>';
				break;

			case 'file':
				?>
				<script>
				jQuery(function($) {
					var frame;

					$('#<?php echo esc_js( $field['id'] ); ?>_button').on('click', function(e) {
						e.preventDefault();

						var options = {
							state: 'insert',
							frame: 'post'
						};

						frame = wp.media(options).open();

						// CUSTOMIZE VIEWS
						frame.menu.get('view').unset('gallery');
						frame.menu.get('view').unset('featured-image');

						frame.toolbar.get('view').set({
							insert: {
								style: 'primary',
								text: '<?php esc_js( 'Insert', 'ava' ); ?>',

								click: function() {
									var models = frame.state().get('selection'),
										url = models.first().attributes.url;

									$('#<?php echo esc_js( $field['id'] ); ?>').val( url );

									frame.close();
								}
							}
						});


					});

				});
				</script>
			<?php
				break;

			case 'image':
				?>
				<script>
				jQuery(function($) {
					var frame;

					$('#<?php echo esc_js( $field['id'] ); ?>_button').on('click', function(e) {
						e.preventDefault();

						var options = {
							state: 'insert',
							frame: 'post'
						};

						frame = wp.media(options).open();

						frame.menu.get('view').unset('gallery');
						frame.menu.get('view').unset('featured-image');

						frame.toolbar.get('view').set({
							insert: {
								style: 'primary',
								text: '<?php esc_html_e( 'Insert', 'ava' ); ?>',

								click: function() {
									var models = frame.state().get('selection'),
											id = models.first().attributes.id;

										this.el.innerHTML = '<?php esc_html_e( 'Saving...', 'ava' ); ?>';

										$.ajax({
											type: 'POST',
											url: ajaxurl,
											data: {
												id: id,
												action: 'ava_grid_feat_image_save',
												post_id: ava_ajax.post_id,
												nonce: ava_ajax.nonce
											},
											success: function(){
												$('#<?php echo esc_js( $field['id'] ); ?>').val( id );
												frame.close();
											},
											dataType: 'html'
										}).done( function( data ) {
											$('#<?php echo esc_js( $field['id'] ); ?> ~ .index-meta-thumbnails').html( data );
										});
								}
							}
						});
					});
				});
				</script>
			<?php
				break;

			case 'images':
				?>
				<script>
				jQuery(function($) {
					var frame,
						images = '<?php echo get_post_meta( $post->ID, '_ava_image_ids', true ); ?>',
						selection = loadImages(images);

					$('#ava_images_upload').on('click', function(e) {
						e.preventDefault();

						var options = {
							title: '<?php esc_html_e( 'Create Gallery', 'ava' ); ?>',
							state: 'gallery-edit',
							frame: 'post',
							selection: selection
						};

						if( frame || selection ) {
							options['title'] = '<?php esc_html_e( 'Edit Gallery', 'ava' ); ?>';
						}

						frame = wp.media(options).open();

						frame.menu.get('view').get('cancel').el.innerHTML = '<?php esc_html_e( 'Cancel', 'ava' ); ?>';
						frame.menu.get('view').get('gallery-edit').el.innerHTML = '<?php esc_html_e( 'Edit Gallery', 'ava' ); ?>';
						frame.content.get('view').sidebar.unset('gallery');

						overrideGalleryInsert();
						frame.on( 'toolbar:render:gallery-edit', function() {
							overrideGalleryInsert();
						});

						frame.on( 'content:render:browse', function( browser ) {
							if ( !browser ) return;

							browser.sidebar.on('ready', function(){
								browser.sidebar.unset('gallery');
							});

							browser.toolbar.on('ready', function(){
								if(browser.toolbar.controller._state == 'gallery-library'){
									browser.toolbar.$el.hide();
								}
							});
						});

						frame.state().get('library').on( 'remove', function() {
							var models = frame.state().get('library');
							if(models.length == 0){
								selection = false;
								$.post(ajaxurl, { ids: '', action: 'ava_image_save', post_id: ava_ajax.post_id, nonce: ava_ajax.nonce });
							}
						});

						function overrideGalleryInsert() {
							frame.toolbar.get('view').set({
								insert: {
									style: 'primary',
									text: '<?php esc_html_e( 'Save Gallery', 'ava' ); ?>',

									click: function() {
										var models = frame.state().get('library'),
											ids = '';

										models.each( function( attachment ) {
											ids += attachment.id + ','
										});

										this.el.innerHTML = '<?php esc_html_e( 'Saving...', 'ava' ); ?>';

										$.ajax({
											type: 'POST',
											url: ajaxurl,
											data: {
												ids: ids,
												action: 'ava_image_save',
												post_id: ava_ajax.post_id,
												nonce: ava_ajax.nonce
											},
											success: function(){
												selection = loadImages(ids);
												$('#_ava_image_ids').val( ids );
												frame.close();
											},
											dataType: 'html'
										}).done( function( data ) {
											$('.index-meta-thumbnails').html( data );
										});
									}
								}
							});
						}
					});

					function loadImages(images) {
						if( images ){
							var shortcode = new wp.shortcode({
								tag:    'gallery',
								attrs:   { ids: images },
								type:   'single'
							});

							var attachments = wp.media.gallery.attachments( shortcode );

							var selection = new wp.media.model.Selection( attachments.models, {
								props:    attachments.props.toJSON(),
								multiple: true
							});

							selection.gallery = attachments.gallery;

							// QUERY ATTACHMENTS
							// SORTING
							selection.more().done( function() {
								selection.props.set({ query: false });
								selection.unmirror();
								selection.props.unset('orderby');
							});

							return selection;
						}

						return false;
					}

				});
				</script>

				<?php
				$meta             = get_post_meta( $post->ID, '_ava_image_ids', true );
				$thumbnail_output = '';
				$button_text      = ( $meta ) ? esc_html__( 'Edit Gallery', 'ava' ) : $field['std'];
				if ( $meta ) {
					$field['std']     = esc_html__( 'Edit Gallery', 'ava' );
					$thumbs           = explode( ',', $meta );
					$thumbnail_output = '';
					foreach ( $thumbs as $thumb ) {
						$thumbnail_output .= '<li>' . wp_get_attachment_image( $thumb, array( 40, 40 ) ) . '</li>';
					}
				}

				echo
					'<td>
                        <input type="button" class="button" name="' . esc_attr( $field['id'] ) . '" id="ava_images_upload" value="' . esc_html( $button_text ) . '" />
                        <input type="hidden" name="ava_meta[_ava_image_ids]" id="_ava_image_ids" value="' . ( $meta ? $meta : 'false' ) . '" />
                        <ul class="index-meta-thumbnails">' . $thumbnail_output . '</ul>
                    </td>';

				break;

			case 'select':
				echo '<td><select name="ava_meta[' . $field['id'] . ']" id="' . $field['id'] . '">';
				foreach ( $field['options'] as $key => $option ) {
					echo '<option value="' . $key . '"';
					if ( $meta ) {
						if ( $meta == $key ) {
							echo ' selected="selected"';
						}
					} else {
						if ( $field['std'] == $key ) {
							echo ' selected="selected"';
						}
					}
					echo '>' . $option . '</option>';
				}
				echo '</select></td>';
				break;

			case 'radio':
				echo '<td>';
				foreach ( $field['options'] as $key => $option ) {
					echo '<label class="radio-label"><input type="radio" name="ava_meta[' . $field['id'] . ']" value="' . $key . '" class="radio"';
					if ( $meta ) {
						if ( $meta == $key ) {
							echo ' checked="checked"';
						}
					} else {
						if ( $field['std'] == $key ) {
							echo ' checked="checked"';
						}
					}
					echo ' /> ' . $option . '</label> ';
				}
				echo '</td>';
				break;

			case 'color':
				if ( array_key_exists( 'val', $field ) ) {
					$val = $field['val'];
				}
				if ( $meta ) {
					$val = $meta;
				}
				echo '<td class="index-box-' . $field['type'] . '">';
				echo '<input data-default-color="' . $field['std'] . '" type="text" id="' . $field['id'] . '" name="ava_meta[' . $field['id'] . ']" value="' . $val . '" class="colorpicker">';
				echo '</div>';
				echo '</td>';
				break;

			case 'checkbox':
				echo '<td>';
				$val = '';
				if ( $meta ) {
					if ( $meta == 'on' ) {
						$val = ' checked="checked"';
					}
				} else {
					if ( $field['std'] == 'on' ) {
						$val = ' checked="checked"';
					}
				}

				echo '<input type="hidden" name="ava_meta[' . $field['id'] . ']" value="off" />
                <input type="checkbox" id="' . $field['id'] . '" name="ava_meta[' . $field['id'] . ']" value="on"' . $val . ' /><span>' . esc_html__( 'Yes, please do', 'ava' ) . '</span>';
				echo '</td>';
				break;
		}

		echo '</tr>';
	}

	echo '</table>';
}



/**
 * Save metaboxes
 */
function ava_save_meta_box( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['ava_meta'] ) || ! isset( $_POST['ava_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ava_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	foreach ( $_POST['ava_meta'] as $key => $val ) {
		update_post_meta( $post_id, $key, $val );
	}

}
add_action( 'save_post', 'ava_save_meta_box' );



/**
 * Save images
 */
function ava_image_save() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['ids'] ) || ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'index-ajax' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	$ids = strip_tags( rtrim( $_POST['ids'], ',' ) );
	update_post_meta( $_POST['post_id'], '_ava_image_ids', $ids );

	$thumbs           = explode( ',', $ids );
	$thumbnail_output = '';
	foreach ( $thumbs as $thumb ) {
		$thumbnail_output .= '<li>' . wp_get_attachment_image( $thumb, array( 40, 40 ) ) . '</li>';
	}

	echo balanceTags( $thumbnail_output );

	die();
}
add_action( 'wp_ajax_ava_image_save', 'ava_image_save' );



/**
 * Save the grid featured image
 */
function ava_grid_feat_image_save() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! isset( $_POST['id'] ) || ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'index-ajax' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}

	$id = strip_tags( $_POST['id'] );

	if ( ! is_numeric( $id ) ) {
		return;
	}

	update_post_meta( $_POST['post_id'], '_ava_grid_feat_img', $id );

	$thumbnail_output .= '<li>' . wp_get_attachment_image( $id, array( 40, 40 ) ) . '</li>';

	echo balanceTags( $thumbnail_output );

	die();
}
add_action( 'wp_ajax_ava_grid_feat_image_save', 'ava_grid_feat_image_save' );



/**
 * Scripts
 */
function ava_metabox_portfolio_scripts() {
	global $post;

	wp_enqueue_script( 'media-upload' );

	if ( isset( $post ) ) {
		wp_localize_script(
			'jquery', 'ava_ajax', array(
				'post_id' => $post->ID,
				'nonce'   => wp_create_nonce( 'index-ajax' ),
			)
		);
	}
}
add_action( 'admin_enqueue_scripts', 'ava_metabox_portfolio_scripts' );
?>
