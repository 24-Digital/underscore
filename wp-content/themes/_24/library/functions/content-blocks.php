<?php

/*
*  Blocks
*
*  Get all flexible blocks for the current page
*
*  @type    function
*  @date    30th July 2014
*
*  @param   $block_name = the ACF name of the flexible field you're referencing
*           $post_id 	= defaults to the current post if not provided
*           $folder 	= if the blocks are broken into subfolders, provide it here (no slashes, please, unless a sub-subfolder is needed)
*           $echo 		= defaults to true, if passed as false, the items are return in an array (with HTML)
*
*  @return  compiled HTML in an array for each sub_field if echo is false
*/

if(!function_exists('get_blocks')) {

	function get_blocks($block_name = 'content_blocks', $post_id = '', $folder = '', $echo = true)
	{

		// vars
		$blocks = array();

		// check if ACF is turned on
		if(!class_exists('acf')){

			// bail out early
			return false;

		}

		// default to current post id if none provided
		if( !isset( $post_id ) || $post_id == '' ) {

			// set to the global
		    global $post;
			$post_id = $post->ID;

		}

		// ensure we have a trailing slash on our subfolder
		$folder .= '/';

		// only store to transient if we're in production
		if(WP_ENV == 'production') {

			// setup the transient name			
			$transient_name = '_transient_' . $block_name . '_' . $post_id;

			// check if the transient exists
			$the_transient = get_transient( $transient_name );

			// if it does, output to HTMl or return the correct variable
			if( $the_transient != false && !empty($the_transient) ) {

				// checking if we should echo or not
				if($echo == true) {

					// looping through each row and echoing to HTML
					foreach ($the_transient as $rows) {
						
						echo $rows;

					}

					// bail out of the function
					return false;

				} else {

					// return the transient to variables
					$blocks = $the_transient;
					return $blocks;

				}


			} // end if transient

		}

		// does this field exist?
		if( get_field( $block_name, $post_id ) ) {

			// loop through all the sub items in the flexible block
			while( has_sub_field( $block_name, $post_id ) ):

				// get the current row layout and template
				$layout = get_row_layout();
				$path = 'library/partials/blocks/' . $folder . $layout . '.php';
				$the_template = locate_template( $path );


				// test to see if this template exists
				if( $the_template != '') {

					// if it does, add it to our file array or echo it out
					if($echo === true) {

						include( $the_template );

					} 

					if($echo === false || isset($transient_name) ) {

						ob_start();

	    					include( $the_template );

						$blocks[] = ob_get_clean();

					}

				} else {

					echo "Block Name: ". $layout . " failed to locate, please check template path (" . $path . ") is correct.";

				}

			// close while has_sub_field
			endwhile;


			// only store to transient if we're in production
			if(WP_ENV == 'production') {
			
				set_transient( $transient_name, $blocks, HOUR_IN_SECONDS );

			}

			// return our blocks object if we're not echoing
			if( $echo != true ) {

				return $blocks;

			}

		
		} // close if get_field 
		else {

			echo 'Unable to locate content blocks';

		} // end get_field loop

	} // end get_blocks


} // end if function exists
