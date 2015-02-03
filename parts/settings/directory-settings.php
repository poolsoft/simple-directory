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
	,'label'=>'Show Theme Sidebar on Single Listing?'
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
	,'label'=>'Show Theme Sidebar on Listing Archive?'
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
	,'field'=>'show_credit_link'
	,'label'=>'Show a credit link in the footer?'
	,'help' =>'This plugin is free, but it takes a lot of work.  Show a little love by letting us place a small link in the footer of your site.  Thanks!'
	,'value' => 'no'
	,'attributes' => array(
		'class' => 'text'
		)
	,'choices' =>array(
		'yes' => 'Yes'
		,'no' => 'No'
		)
		)); 		
  piklist('field', array(
    'type' => 'textarea'
    ,'field' => 'listing_custom_css'
    ,'label' => 'Custom CSS'
	,'help' => 'You can customize the appearance of your listings and archive pages with your own CSS.'
    ,'value' => ''
    ,'attributes' => array(
      'rows' => 10
      ,'cols' => 50
      ,'class' => 'large-text code'
    )
  ));


  piklist('shared/code-locater', array(
    'location' => __FILE__
    ,'type' => 'Meta Box'
  ));