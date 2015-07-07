<?php
/*
Title:Social Links
Post Type: listing
*/
piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_gplus',
	'label' => __('URL of your Google + Page','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));

piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_facebook',
	'label' => __('URL of your Facebook page','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));
 
piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_twitter',
	'label' => __('Your Twitter Username','simple-dir')
	,'description' => __('Your username without the @','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));

piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_linkedin',
	'label' => __('URL of your LinkedIn Profile','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));

piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_instagram',
	'label' => __('Your Instagram Username','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));
piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_youtube',
	'label' => __('URL of your YouTube Channel','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));

piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_rss',
	'label' => __('URL of your RSS Feed','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));

piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_pinterest',
	'label' => __('URL of your Pinterest page','simple-dir')
	,'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));