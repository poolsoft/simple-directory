<?php
/*
Title:Listing Details
Post Type: listing
*/

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_email',
	'label' => 'Email Address',
	'attributes' => array(
		'class' => 'text')
));

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_phone_1',
	'label' => 'Telephone Number',
	'description' => 'Primary Telephone Number',
	'attributes' => array(
		'class' =>'text'
	)
));

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_phone_2',
	'label' => 'Telephone Number',
	'description' => 'Other Telephone Number',
	'attributes' => array(
		'class' =>'text'
	)
)); 

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_fax',
	'label' => 'Fax Number',
	'description' => '',
	'attributes' => array(
		'class' =>'text'
	)
));
piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_website_url',
	'label' => 'Website URL',
	'description' =>'The address of your website',
	'attributes' => array(
		'class' =>'text')
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_street_address',
	'label'=> 'Street Address',
	'description' => 'Street Address',
	'attributes' => array(
		'class' => 'text')
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_city',
	'label'=> 'City',
	'description' => 'City',
	'attributes' => array(
		'class' => 'text')
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_state',
	'label'=> 'State/Province',
	'description' => '',
	'attributes' => array(
		'class' => 'text')
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_country',
	'label'=> 'Country',
	'description' => '',
	'attributes' => array(
		'class' => 'text')
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_postalcode',
	'label'=> 'ZIP/Postal Code',
	'description' => '',
	'attributes' => array(
		'class' => 'text')
));



		
