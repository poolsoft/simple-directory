<?php 
/*
Title: Simple Directory Settings
Setting: simple_directory_settings
Tab Order: 1
Order: 30
*/
 piklist ('field', array(
	'type' => 'select'
	,'field' =>'simple_directory_disable_foundation'
	,'label' => __('Disable Foundation CSS?', 'simple_dir')
	,'help' => __('If your theme already uses Foundation, or if you are experiencing conflicts with the styling or layouts, you can disable Simple Directory&apos;s loading of the Foundation CSS.','simple_dir')
	,'attributes' => array(
		'class'=> 'text'
		)
	,'choices' => array(
		'yes' => __('Yes','simple_dir')
		,'no' => __('No', 'simple_dir')
		)
	,'value' => 'no'
	)
	);
 piklist ('field', array(
	'type' => 'select'
	,'field'=>'single_listing_show_sidebar'
	,'label'=>__('Show Theme Sidebar on Single Listing?','simple-dir')
	,'attributes' => array(
		'class' => 'text'
		)
	,'choices' =>array(
		'yes' => 'Yes'
		,'no' => 'No'
		)
		));
 piklist ('field', array(
	'type' => 'select'
	,'field'=>'archive_listing_show_sidebar'
	,'label'=>__('Show Theme Sidebar on Listing Archive?','simple-dir')
	,'attributes' => array(
		'class' => 'text'
		)
	,'choices' =>array(
		'yes' => 'Yes'
		,'no' => 'No'
		)
		)); 
		 piklist ('field', array(
	'type' => 'select'
	,'field'=>'enable_sitelinks_search'
	,'label'=>__('Enable Sitelinks Search in Google Results?','simple-dir')
	,'value'=> 'yes'
	,'attributes' => array(
		'class' => 'text'
		)
	,'choices' =>array(
		'yes' => __('Yes','simple-dir')
		,'no' => __('No','simple-dir')
		)
		)); 
		
piklist ('field', array(
	'type' => 'select'
	,'field' =>'show_comments'
	,'label' =>__('Enable Comments?','simple-dir')
	,'help' => __('Allow users to leave comments on listings?','simple-dir')
	,'value' => 'yes'
	,'choices' => array(
		'yes' => __('Yes', 'simple-dir')
		,'no' => __('No','simple-dir')
		)
	,'attributes' => array(
		'class' => 'text'
		)
		));
 piklist ('field', array(
	'type' => 'select'
	,'field'=>'show_credit_link'
	,'label'=>__('Show a credit link in the footer?','simple-dir')
	,'help' =>__('This plugin is free, but it takes a lot of work.  Show a little love by letting us place a small link in the footer of your site.  Thanks!','simple-dir')
	,'value' => 'no'
	,'attributes' => array(
		'class' => 'text'
		)
	,'choices' =>array(
		'yes' => __('Yes','simple-dir')
		,'no' => __('No','simple-dir')
		)
		)); 		
  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'listing_custom_css'
    ,'label' => __('Custom CSS','simple-dir')
	,'help' => __('You can customize the appearance of your listings and archive pages with your own CSS.','simple-dir')
    ,'value' => ''
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => 'large-text code'
    )
  ));


  
