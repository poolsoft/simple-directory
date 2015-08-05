<?php
/*
Title:Listing Details
Post Type: listing
Priority: high
*/
piklist ('field', array(
	'type' => 'radio'
	,'field' => 'listing_type'
	,'label' =>__('Type')
	,'value' =>'organization'
	,'attributes' => array(
		'class' =>'text'
	)
	,'choices' => array(
	'individual' => __('Individual')
	,'organization' => __('Organization')
	)
	));
	
piklist ('field', array(
		'type' => 'text'
		,'field' =>'listing_ind_org'
		,'label' => __('Organization')
		,'attributes' => array(
			'class' => 'text'
			)
		,'conditions' => array(
		array(
			'field' => 'listing_type'
			,'value' =>'individual'
			))
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
			));
piklist ('field' ,array(
		'type' =>'text'
		,'field' =>'listing_ind_title'
		,'label' =>__('Title')
		,'attributes'=>array(
			'class' =>'text'
			)
		,'conditions' => array(
			array(
				'field' => 'listing_type'
				,'value' =>'individual'
				))
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
			));
piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_email',
	'label' => 'Email Address',
	'attributes' => array(
		'class' => 'text')
	,'sanitize' => array(
      array(
        'type' => 'email'
      )
    )
));

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_phone_1',
	'label' => 'Telephone Number',
	'description' => 'Primary Telephone Number',
	'attributes' => array(
		'class' =>'text'
	)
	,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
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
	,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
)); 

piklist ('field', array(
	'type' => 'text'
	,'field' =>'phone_2_label'
	,'label' => __('Label for Other Phone Number','simple-dir')
	,'help' =>__('Enter the label you want displayed with the other phone number.  Examples are \'mobile\' or \'toll free\'.','simple-dir')
	,'sanitize' => array(
		array(
		'type' => 'text_field'
		))
		));

piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_fax',
	'label' => 'Fax Number',
	'description' => '',
	'attributes' => array(
		'class' =>'text'
	)
	,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
));
piklist ('field', array(
	'type' => 'text',
	'field' => 'listing_website_url',
	'label' => 'Website URL',
	'description' =>'The address of your website, <strong>without the http://</strong>',
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
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
));

piklist ('field', array(
	'type'=> 'text',
	'field'=> 'listing_city',
	'label'=> 'City',
	'description' => 'City',
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
	'field'=> 'listing_state',
	'label'=> 'State/Province',
	'description' => '',
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
	'field'=> 'listing_country',
	'label'=> 'Country',
	'description' => '',
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
	'field'=> 'listing_postalcode',
	'label'=> 'ZIP/Postal Code',
	'description' => '',
	'attributes' => array(
		'class' => 'text')
		,'sanitize' => array(
      array(
        'type' => 'text_field'
      )
    )
));



		
