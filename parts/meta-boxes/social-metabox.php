<?php
/*
Title:Social Links
Post Type: listing
*/
piklist ('field', array(
	'type'=> 'text',
	'scope' => 'post_meta',
	'field' => 'listing_gplus',
	'label' => 'URL of your Google + Page',
	'attributes' => array(
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
	'label' => 'URL of your Facebook page',
	'attributes' => array(
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
	'label' => 'Your Twitter Username',
	'description' => 'Your username without the @',
	'attributes' => array(
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
	'label' => 'URL of your LinkedIn Profile',
	'attributes' => array(
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
	'label' => 'Your Instagram Username',
	'attributes' => array(
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
	'label' => 'URL of your YouTube Channel',
	'attributes' => array(
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
	'label' => 'URL of your RSS Feed',
	'attributes' => array(
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
	'label' => 'URL of your Pinterest page',
	'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )

));