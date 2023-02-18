<?php
$id = get_page_by_path('entry');
wp_redirect(get_permalink($id), 301)
 ?>
