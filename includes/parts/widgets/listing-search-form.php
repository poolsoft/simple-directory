<?php

piklist('field', array(
	'type' =>'text',
	'field' =>'search_widget_title',
	'label' =>__('Widget Title'),
	'attributes' =>array(
		'class'=>'text'
		)
		));
		
piklist('field',array(
	'type' =>'text',
	'field' => 'search_widget_text',
	'label' => __('Default Search Text'),
	'help' => __('Set the default text that appears in the search box.'),
	'value' => __('What are you looking for?'),
	'attributes' => array(
		'class' => 'text'
		)
		));