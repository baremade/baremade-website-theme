<?php
function categories_list_group_filter ($variable) {
   $variable = str_replace('<a href="', '<a class="button" href="', $variable);
   return $variable;
}
add_filter('wp_list_categories','categories_list_group_filter');