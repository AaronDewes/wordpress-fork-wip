<?php
/**
 * Deprecated functions from past WordPress versions. You shouldn't use these
 * functions and look for the alternatives instead. The functions will be
 * removed in a later version.
 *
 * @package WordPress
 * @subpackage Deprecated
 */

/*
 * Deprecated functions come here to die.
 */

/**
 * Return the user request object for the specified request ID.
 *
 * @since 4.9.6
 * @deprecated 5.4.0 Use wp_get_user_request()
 * @see wp_get_user_request()
 *
 * @param int $request_id The ID of the user request.
 * @return WP_User_Request|false
 */
function wp_get_user_request_data( $request_id ) {
	_deprecated_function( __FUNCTION__, '5.4.0', 'wp_get_user_request()' );
	return wp_get_user_request( $request_id );
}

/**
 * Filters 'img' elements in post content to add 'srcset' and 'sizes' attributes.
 *
 * @since 4.4.0
 * @deprecated 5.5.0
 *
 * @see wp_image_add_srcset_and_sizes()
 *
 * @param string $content The raw post content to be filtered.
 * @return string Converted content with 'srcset' and 'sizes' attributes added to images.
 */
function wp_make_content_images_responsive( $content ) {
	_deprecated_function( __FUNCTION__, '5.5.0', 'wp_filter_content_tags()' );

	// This will also add the `loading` attribute to `img` tags, if enabled.
	return wp_filter_content_tags( $content );
}

/**
 * Turn register globals off.
 *
 * @since 2.1.0
 * @access private
 * @deprecated 5.5.0
 */
function wp_unregister_GLOBALS() {  // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.FunctionNameInvalid
	// register_globals was deprecated in PHP 5.3 and removed entirely in PHP 5.4.
	_deprecated_function( __FUNCTION__, '5.5.0' );
}

/**
 * Does comment contain disallowed characters or words.
 *
 * @since 1.5.0
 * @deprecated 5.5.0 Use wp_check_comment_disallowed_list() instead.
 *                   Please consider writing more inclusive code.
 *
 * @param string $author The author of the comment
 * @param string $email The email of the comment
 * @param string $url The url used in the comment
 * @param string $comment The comment content
 * @param string $user_ip The comment author's IP address
 * @param string $user_agent The author's browser user agent
 * @return bool True if comment contains disallowed content, false if comment does not
 */
function wp_blacklist_check( $author, $email, $url, $comment, $user_ip, $user_agent ) {
	_deprecated_function( __FUNCTION__, '5.5.0', 'wp_check_comment_disallowed_list()' );

	return wp_check_comment_disallowed_list( $author, $email, $url, $comment, $user_ip, $user_agent );
}

/**
 * Filters out `register_meta()` args based on an allowed list.
 *
 * `register_meta()` args may change over time, so requiring the allowed list
 * to be explicitly turned off is a warranty seal of sorts.
 *
 * @access private
 * @since 4.6.0
 * @deprecated 5.5.0 Use _wp_register_meta_args_allowed_list() instead.
 *                   Please consider writing more inclusive code.
 *
 * @param array $args         Arguments from `register_meta()`.
 * @param array $default_args Default arguments for `register_meta()`.
 * @return array Filtered arguments.
 */
function _wp_register_meta_args_whitelist( $args, $default_args ) {
	_deprecated_function( __FUNCTION__, '5.5.0', '_wp_register_meta_args_allowed_list()' );

	return _wp_register_meta_args_allowed_list( $args, $default_args );
}

/**
 * Adds an array of options to the list of allowed options.
 *
 * @since 2.7.0
 * @deprecated 5.5.0 Use add_allowed_options() instead.
 *                   Please consider writing more inclusive code.
 *
 * @global array $allowed_options
 *
 * @param array        $new_options
 * @param string|array $options
 * @return array
 */
function add_option_whitelist( $new_options, $options = '' ) {
	_deprecated_function( __FUNCTION__, '5.5.0', 'add_allowed_options()' );

	return add_allowed_options( $new_options, $options );
}

/**
 * Removes a list of options from the allowed options list.
 *
 * @since 2.7.0
 * @deprecated 5.5.0 Use remove_allowed_options() instead.
 *                   Please consider writing more inclusive code.
 *
 * @global array $allowed_options
 *
 * @param array        $del_options
 * @param string|array $options
 * @return array
 */
function remove_option_whitelist( $del_options, $options = '' ) {
	_deprecated_function( __FUNCTION__, '5.5.0', 'remove_allowed_options()' );

	return remove_allowed_options( $del_options, $options );
}

/**
 * Adds slashes to only string values in an array of values.
 *
 * This should be used when preparing data for core APIs that expect slashed data.
 * This should not be used to escape data going directly into an SQL query.
 *
 * @since 5.3.0
 * @deprecated 5.6.0 Use wp_slash()
 *
 * @see wp_slash()
 *
 * @param mixed $value Scalar or array of scalars.
 * @return mixed Slashes $value
 */
function wp_slash_strings_only( $value ) {
	return map_deep( $value, 'addslashes_strings_only' );
}

/**
 * Adds slashes only if the provided value is a string.
 *
 * @since 5.3.0
 * @deprecated 5.6.0
 *
 * @see wp_slash()
 *
 * @param mixed $value
 * @return mixed
 */
function addslashes_strings_only( $value ) {
	return is_string( $value ) ? addslashes( $value ) : $value;
}

/**
 * Displays a `noindex` meta tag if required by the blog configuration.
 *
 * If a blog is marked as not being public then the `noindex` meta tag will be
 * output to tell web robots not to index the page content.
 *
 * Typical usage is as a {@see 'wp_head'} callback:
 *
 *     add_action( 'wp_head', 'noindex' );
 *
 * @see wp_no_robots()
 *
 * @since 2.1.0
 * @deprecated 5.7.0 Use wp_robots_noindex() instead on 'wp_robots' filter.
 */
function noindex() {
	_deprecated_function( __FUNCTION__, '5.7.0', 'wp_robots_noindex()' );

	// If the blog is not public, tell robots to go away.
	if ( '0' == get_option( 'blog_public' ) ) {
		wp_no_robots();
	}
}

/**
 * Display a `noindex` meta tag.
 *
 * Outputs a `noindex` meta tag that tells web robots not to index the page content.
 *
 * Typical usage is as a {@see 'wp_head'} callback:
 *
 *     add_action( 'wp_head', 'wp_no_robots' );
 *
 * @since 3.3.0
 * @since 5.3.0 Echo `noindex,nofollow` if search engine visibility is discouraged.
 * @deprecated 5.7.0 Use wp_robots_no_robots() instead on 'wp_robots' filter.
 */
function wp_no_robots() {
	_deprecated_function( __FUNCTION__, '5.7.0', 'wp_robots_no_robots()' );

	if ( get_option( 'blog_public' ) ) {
		echo "<meta name='robots' content='noindex,follow' />\n";
		return;
	}

	echo "<meta name='robots' content='noindex,nofollow' />\n";
}

/**
 * Display a `noindex,noarchive` meta tag and referrer `strict-origin-when-cross-origin` meta tag.
 *
 * Outputs a `noindex,noarchive` meta tag that tells web robots not to index or cache the page content.
 * Outputs a referrer `strict-origin-when-cross-origin` meta tag that tells the browser not to send
 * the full URL as a referrer to other sites when cross-origin assets are loaded.
 *
 * Typical usage is as a {@see 'wp_head'} callback:
 *
 *     add_action( 'wp_head', 'wp_sensitive_page_meta' );
 *
 * @since 5.0.1
 * @deprecated 5.7.0 Use wp_robots_sensitive_page() instead on 'wp_robots' filter
 *                   and wp_strict_cross_origin_referrer() on 'wp_head' action.
 *
 * @see wp_robots_sensitive_page()
 */
function wp_sensitive_page_meta() {
	_deprecated_function( __FUNCTION__, '5.7.0', 'wp_robots_sensitive_page()' );

	?>
	<meta name='robots' content='noindex,noarchive' />
	<?php
	wp_strict_cross_origin_referrer();
}

/**
 * Render inner blocks from the `core/columns` block for generating an excerpt.
 *
 * @since 5.2.0
 * @access private
 * @deprecated 5.8.0 Use _excerpt_render_inner_blocks() introduced in 5.8.0.
 *
 * @see _excerpt_render_inner_blocks()
 *
 * @param array $columns        The parsed columns block.
 * @param array $allowed_blocks The list of allowed inner blocks.
 * @return string The rendered inner blocks.
 */
function _excerpt_render_inner_columns_blocks( $columns, $allowed_blocks ) {
	_deprecated_function( __FUNCTION__, '5.8.0', '_excerpt_render_inner_blocks()' );

	return _excerpt_render_inner_blocks( $columns, $allowed_blocks );
}

/**
 * Renders the duotone filter SVG and returns the CSS filter property to
 * reference the rendered SVG.
 *
 * @since 5.9.0
 * @deprecated 5.9.1 Use wp_get_duotone_filter_property() introduced in 5.9.1.
 *
 * @see wp_get_duotone_filter_property()
 *
 * @param array $preset Duotone preset value as seen in theme.json.
 * @return string Duotone CSS filter property.
 */
function wp_render_duotone_filter_preset( $preset ) {
	_deprecated_function( __FUNCTION__, '5.9.1', 'wp_get_duotone_filter_property()' );

	return wp_get_duotone_filter_property( $preset );
}

/**
 * Checks whether serialization of the current block's border properties should occur.
 *
 * @since 5.8.0
 * @access private
 * @deprecated 6.0.0 Use wp_should_skip_block_supports_serialization() introduced in 6.0.0.
 *
 * @see wp_should_skip_block_supports_serialization()
 *
 * @param WP_Block_Type $block_type Block type.
 * @return bool Whether serialization of the current block's border properties
 *              should occur.
 */
function wp_skip_border_serialization( $block_type ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'wp_should_skip_block_supports_serialization()' );

	$border_support = _wp_array_get( $block_type->supports, array( '__experimentalBorder' ), false );

	return is_array( $border_support ) &&
		array_key_exists( '__experimentalSkipSerialization', $border_support ) &&
		$border_support['__experimentalSkipSerialization'];
}

/**
 * Checks whether serialization of the current block's dimensions properties should occur.
 *
 * @since 5.9.0
 * @access private
 * @deprecated 6.0.0 Use wp_should_skip_block_supports_serialization() introduced in 6.0.0.
 *
 * @see wp_should_skip_block_supports_serialization()
 *
 * @param WP_Block_type $block_type Block type.
 * @return bool Whether to serialize spacing support styles & classes.
 */
function wp_skip_dimensions_serialization( $block_type ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'wp_should_skip_block_supports_serialization()' );

	$dimensions_support = _wp_array_get( $block_type->supports, array( '__experimentalDimensions' ), false );

	return is_array( $dimensions_support ) &&
		array_key_exists( '__experimentalSkipSerialization', $dimensions_support ) &&
		$dimensions_support['__experimentalSkipSerialization'];
}

/**
 * Checks whether serialization of the current block's spacing properties should occur.
 *
 * @since 5.9.0
 * @access private
 * @deprecated 6.0.0 Use wp_should_skip_block_supports_serialization() introduced in 6.0.0.
 *
 * @see wp_should_skip_block_supports_serialization()
 *
 * @param WP_Block_Type $block_type Block type.
 * @return bool Whether to serialize spacing support styles & classes.
 */
function wp_skip_spacing_serialization( $block_type ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'wp_should_skip_block_supports_serialization()' );

	$spacing_support = _wp_array_get( $block_type->supports, array( 'spacing' ), false );

	return is_array( $spacing_support ) &&
		array_key_exists( '__experimentalSkipSerialization', $spacing_support ) &&
		$spacing_support['__experimentalSkipSerialization'];
}

/**
 * Inject the block editor assets that need to be loaded into the editor's iframe as an inline script.
 *
 * @since 5.8.0
 * @deprecated 6.0.0
 */
function wp_add_iframed_editor_assets_html() {
	_deprecated_function( __FUNCTION__, '6.0.0' );
}
