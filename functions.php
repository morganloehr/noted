<?php

// enqueue the child theme stylesheet

Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_register_style( 'molostyle', get_stylesheet_directory_uri() . '/molostyle.css'  );
wp_register_style( 'animate', get_stylesheet_directory_uri() . '/animate.css'  );
wp_enqueue_style( 'childstyle' );
wp_enqueue_style( 'molostyle' );

wp_enqueue_script('external-js', 'http://cdn.jsdelivr.net/jquery/2.1.3/jquery.min.js', array(), true);
wp_enqueue_script('morphext-js', get_stylesheet_directory_uri() . '/js/morphext.min.js', array('external-js'), true );
// wp_enqueue_script('smartscroll-js', get_stylesheet_directory_uri() . '/js/jquery.smartscroll.min.js', array('morphext-js'), true );
wp_enqueue_script('appear-js', get_stylesheet_directory_uri() . '/js/jquery.appear.js', array('morphext-js'), true );
wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('appear-js'), true );


// wp_enqueue_script('colorbox-js', get_stylesheet_directory_uri() . '/js/jquery.colorbox-min.js', array('typed-content-js'), true );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);


 function render_content_post() {
 
$latest = new WP_Query( array(
 
'post_type' => 'post',
 
'post_status' => 'publish',
 
'orderby' => 'date',
 
'order' => 'DESC'
 
));
 
?>
 

<?php
$result = array();
 
while( $latest->have_posts() ) {
 
$latest->the_post();
 	$id= get_the_ID();
	$title = get_the_title($id);
	$result[$id]=$title;
}
 return $result;
?>
 
 
<?php
 
}
 


function noted_customize_register( $wp_customize ) {
   
   $wp_customize	->	add_panel('noted_blog_panel',array(
   		'title'	=>	__('Noted Blog','noted'),
   		'priority'	=>	1
   	));

   $wp_customize	->	add_section('noted_blog_section',array(
   		'title'	=>	__('Noted Blog selection','noted'),
   		'description'	=>	__('Select the blog','noted'),
   		'panel'	=>	'noted_blog_panel',
   		'priority'	=>1
   	));

   $wp_customize	->	add_setting('noted_blog_large_setting');

   $wp_customize	->	add_control('noted_blog_large_setting',array(
   		'label'	=>	__('Select Large blog','noted'),
   		'section'	=>	'noted_blog_section',
   		'type'	=>	'select',
   		'choices'=> render_content_post()
   		
   	));

   $wp_customize	->	add_setting('noted_blog_small_setting1');

   $wp_customize	->	add_control('noted_blog_small_setting1',array(
   		'label'	=>	__('Select Small blog 1','noted'),
   		'section'	=>	'noted_blog_section',
   		'type'	=>	'select',
   		'choices'=> render_content_post()
   		
   	));

    $wp_customize	->	add_setting('noted_blog_small_setting2');

   $wp_customize	->	add_control('noted_blog_small_setting2',array(
   		'label'	=>	__('Select Small blog 2','noted'),
   		'section'	=>	'noted_blog_section',
   		'type'	=>	'select',
   		'choices'=> render_content_post()
   		
   	));

//    $wp_customize->add_control(
 
// new WP_Customize_Latest_Post_Control(
 
// $wp_customize,
 
// 'noted_blog_large_setting',
 
// array(
 
// 'label' => __( 'Select A Featured Post', 'mynewtheme' ),
 
// 'section' => 'noted_blog_section',
 
// 'settings' => 'noted_blog_large_setting',
 

 
// )
 
// )
 
// );
}
add_action( 'customize_register', 'noted_customize_register' );