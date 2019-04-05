<?php
/*
Name:  WordPress Post Like System
Description:  A simple and efficient post like system for WordPress.
Version:      0.4
Author:       Jon Masterson
Author URI:   http://jonmasterson.com/

License:
Copyright (C) 2014 Jon Masterson

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

add_action( 'wp_ajax_nopriv_jm-post-like', 'ava_post_like' );
add_action( 'wp_ajax_jm-post-like', 'ava_post_like' );

function ava_post_like() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Nope!' );
	}

	if ( isset( $_POST['ava_post_like'] ) ) {

		$post_id         = $_POST['post_id']; // post id
		$post_like_count = get_post_meta( $post_id, '_post_like_count', true ); // post like count

		if ( function_exists( 'wp_cache_post_change' ) ) { // invalidate WP Super Cache if exists
			$GLOBALS['super_cache_enabled'] = 1;
			wp_cache_post_change( $post_id );
		}

		if ( is_user_logged_in() ) { // user is logged in
			$user_id     = get_current_user_id(); // current user
			$meta_POSTS  = get_user_option( '_liked_posts', $user_id ); // post ids from user meta
			$meta_USERS  = get_post_meta( $post_id, '_user_liked' ); // user ids from post meta
			$liked_POSTS = null; // setup array variable
			$liked_USERS = null; // setup array variable

			if ( count( $meta_POSTS ) != 0 ) { // meta exists, set up values
				$liked_POSTS = $meta_POSTS;
			}

			if ( ! is_array( $liked_POSTS ) ) { // make array just in case
				$liked_POSTS = array();
			}

			if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
				$liked_USERS = $meta_USERS[0];
			}

			if ( ! is_array( $liked_USERS ) ) { // make array just in case
				$liked_USERS = array();
			}

			$liked_POSTS[ 'post-' . $post_id ] = $post_id; // Add post id to user meta array
			$liked_USERS[ 'user-' . $user_id ] = $user_id; // add user id to post meta array
			$user_likes                        = count( $liked_POSTS ); // count user likes

			if ( ! ava_already_liked( $post_id ) ) { // like the post
				update_post_meta( $post_id, '_user_liked', $liked_USERS ); // Add user ID to post meta
				update_post_meta( $post_id, '_post_like_count', ++$post_like_count ); // +1 count post meta
				update_user_option( $user_id, '_liked_posts', $liked_POSTS ); // Add post ID to user meta
				update_user_option( $user_id, '_user_like_count', $user_likes ); // +1 count user meta
				echo esc_attr( $post_like_count ); // update count on front end

			} else { // unlike the post
				$pid_key = array_search( $post_id, $liked_POSTS ); // find the key
				$uid_key = array_search( $user_id, $liked_USERS ); // find the key
				unset( $liked_POSTS[ $pid_key ] ); // remove from array
				unset( $liked_USERS[ $uid_key ] ); // remove from array
				$user_likes = count( $liked_POSTS ); // recount user likes
				update_post_meta( $post_id, '_user_liked', $liked_USERS ); // Remove user ID from post meta
				update_post_meta( $post_id, '_post_like_count', --$post_like_count ); // -1 count post meta
				update_user_option( $user_id, '_liked_posts', $liked_POSTS ); // Remove post ID from user meta
				update_user_option( $user_id, '_user_like_count', $user_likes ); // -1 count user meta
				echo 'already' . $post_like_count; // update count on front end

			}
		} else { // user is not logged in (anonymous)
			$ip        = ''; // user IP address
			$meta_IPS  = get_post_meta( $post_id, '_user_IP' ); // stored IP addresses
			$liked_IPS = null; // set up array variable

			if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
				$liked_IPS = $meta_IPS[0];
			}

			if ( ! is_array( $liked_IPS ) ) { // make array just in case
				$liked_IPS = array();
			}

			if ( ! in_array( $ip, $liked_IPS ) ) { // if IP not in array
				$liked_IPS[ 'ip-' . $ip ] = $ip; // add IP to array
			}

			if ( ! ava_already_liked( $post_id ) ) { // like the post
				update_post_meta( $post_id, '_user_IP', $liked_IPS ); // Add user IP to post meta
				update_post_meta( $post_id, '_post_like_count', ++$post_like_count ); // +1 count post meta
				echo esc_attr( $post_like_count ); // update count on front end

			} else { // unlike the post
				$ip_key = array_search( $ip, $liked_IPS ); // find the key
				unset( $liked_IPS[ $ip_key ] ); // remove from array
				update_post_meta( $post_id, '_user_IP', $liked_IPS ); // Remove user IP from post meta
				update_post_meta( $post_id, '_post_like_count', --$post_like_count ); // -1 count post meta
				echo 'already' . $post_like_count; // update count on front end

			}
		}
	}

	exit;
}

/**
 * (3) Test if user already liked post
 */
function ava_already_liked( $post_id ) {
	// test if user liked before
	if ( is_user_logged_in() ) { // user is logged in
		$user_id     = get_current_user_id(); // current user
		$meta_USERS  = get_post_meta( $post_id, '_user_liked' ); // user ids from post meta
		$liked_USERS = ''; // set up array variable
		if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
			$liked_USERS = $meta_USERS[0];
		}
		if ( ! is_array( $liked_USERS ) ) { // make array just in case
			$liked_USERS = array();
		}

		if ( in_array( $user_id, $liked_USERS ) ) { // True if User ID in array
			return true;
		}
		return false;

	} else { // user is anonymous, use IP address for voting

		$meta_IPS  = get_post_meta( $post_id, '_user_IP' ); // get previously voted IP address
		$ip        = ''; // Retrieve current user IP
		$liked_IPS = ''; // set up array variable

		if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
			$liked_IPS = $meta_IPS[0];
		}

		if ( ! is_array( $liked_IPS ) ) { // make array just in case
			$liked_IPS = array();
		}

		if ( in_array( $ip, $liked_IPS ) ) { // True is IP in array
			return true;
		}
		return false;
	}

}

/**
 * (4) Front end button
 */
function ava_get_post_like_link( $post_id ) {

	$like_count = get_post_meta( $post_id, '_post_like_count', true );
	$heart      = ava_get_svg( array( 'icon' => 'heart' ) );
	$count      = ( empty( $like_count ) || $like_count == '0' ) ? '0' : esc_attr( $like_count );

	if ( ava_already_liked( $post_id ) ) {
		$class = 'liked';
		$title = esc_attr( esc_html__( 'Unlike', 'ava' ) );
	} else {
		$class = '';
		$title = esc_attr( esc_html__( 'Like', 'ava' ) );
	}

	$output = '<div class="likes-wrapper ' . esc_attr( $class ) . '"><div class="svg__wrapper"><a href="#" class="jm-post-like pulse-active" data-post_id="' . esc_attr( $post_id ) . '" title="' . esc_attr( $title ) . '">' . $heart . '</a></div><p id="likes-count">' . esc_html( $count ) . '</p></div>';

	return $output;
}
