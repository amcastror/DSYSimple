<?php
function raw_page_content($page_name){
	global $wpdb;
	$ids = $wpdb->get_col("SELECT ID FROM $wpdb->posts WHERE UCASE(post_title) LIKE '$page_name' AND post_type='page'");
	
	if(count($ids) > 0){
	    $args = array(
	        'page_id' => $ids[0]
	    );
	    
	    $page = new WP_Query( $args );

	    if($page->have_posts()){
		    $page->the_post();
			global $post;
			echo $post->post_content;
	    }
	}
	wp_reset_postdata();
}
?>