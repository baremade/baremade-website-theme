<?php

function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <div class="site-search"><span class="site-search-icon"></span><input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" /></div>
    <div class="hidden-submit"><input type="submit" id="searchsubmit" tabindex="-1" /></div>
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );