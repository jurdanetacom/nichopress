<?php 
register_sidebar(array(

    'name' => 'Barra lateral nichopress',
    'id' => 'nichopress-sidebar',
    'description' => 'Widgets en esta area apareceran en la barra lateral del tema.',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="section-label">',
    'after_title' => '</h2>'
  
  ));

?>