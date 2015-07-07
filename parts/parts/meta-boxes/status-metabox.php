<?php
/*
Title: Listing Status
Post Type: listing
Context: side
Priority: high

*/

piklist('field', array(
	'type'=>'select',
	'field' =>'listing_status',
	'label' =>__('Listing Level'),
	'attributes'=>array(
		'class'=>'text'
		),
	'value' => 'basic',
	'choices' =>array(
		'basic' =>__('Basic','simple-dir')
		,'premium' => __('Premium','simple-dir')
		)
		));
	
	