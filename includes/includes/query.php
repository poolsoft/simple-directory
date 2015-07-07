<?php

function simple_dir_modify_query_order( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'simple_dir_modify_query_order' );