<?php

/**
 * @file
 * Configuration options for Simple Share social network links.
 */

/**
 * Menu callback; Settings administration.
 */
function social_share_admin_settings()
{
	$types = node_type_get_types();
	foreach ($types as $type)
	{
		$node_types[$type->type] = $type->name;
	}

	$form['social_share_node_types'] = array(
		'#type'          => 'checkboxes',
		'#title'         => t('Node types'),
		'#description'   => t('Choose which node types to display the share links on.'),
		'#default_value' => variable_get('social_share_node_types', array()),
		'#options'       => $node_types,
	);

	$form['social_share_teaser'] = array(
		'#type'          => 'checkbox',
		'#title'         => t('Display in teaser view'),
		'#description'   => t('If enabled, the share links will appear in node teasers. If disabled, they will only appear on the full node page.'),
		'#default_value' => variable_get('social_share_teaser', 1),
	);

	$form['social_share_new_window'] = array(
		'#type'          => 'checkbox',
		'#title'         => t('Open Links in new window'),
		'#description'   => t('If enabled, the share links will open in a new window'),
		'#default_value' => variable_get('social_share_new_window', 0),
	);

	$form['social_share_block'] = array(
		'#type'          => 'checkbox',
		'#title'         => t('Make links available as a block'),
		'#description'   => t('If enabled, the share links will be available in a block called "Social Share"'),
		'#default_value' => variable_get('social_share_block', 0),
	);

	$form['social_share_label'] = array(
		'#type'          => 'textfield',
		'#title'         => t('Share label'),
		'#default_value' => variable_get('social_share_label', 'Share to'),
	);

	$form['social_share_weight'] = array(
		'#type'          => 'weight',
		'#delta'         => 10,
		'#description'   => t('Where you want the share links to appear in the node. Negative numbers are rendered earlier, positive numbers are rendered later.'),
		'#title'         => t('Weight'),
		'#default_value' => variable_get('social_share_weight', 0),
	);

	$form['social_share_sites'] = array(
		'#type'          => 'checkboxes',
		'#title'         => t('Enabled share links'),
		'#description'   => t('Choose which websites you would like to enable a share link for.'),
		'#default_value' => variable_get('social_share_sites', array()),
		'#options'       => array(
			'facebook'     => t('Facebook'),
			'twitter'      => t('Twitter'),
			'googleplus'   => t('Google Plus'),
			'myspace'      => t('Myspace'),
			'msnlive'      => t('MSN Live'),
			'yahoo'        => t('Yahoo'),
			'linkedin'     => t('LinkedIn'),
			'orkut'        => t('Orkut'),
			'digg'         => t('Digg'),
			'delicious'    => t('Delicious'),
		),
	);

	$form['social_share_twitter_truncate'] = array(
		'#type'          => 'checkbox',
		'#title'         => t('Truncate titles when sharing to twitter'),
		'#description'   => t('If enabled, node titles will be truncated if the URL being shared and the title exceed the twitter character limit of 140
       characters. <strong>NOTE:</strong> Enabling this may cause issues with unicode text (Arabic, Kanji, etc)'),
		'#default_value' => variable_get('social_share_twitter_truncate', 0),
	);

	$form['social_share_max_desc_length'] = array(
		'#type'          => 'textfield',
		'#maxlength'     => 3,
		'#size'          => 3,
		'#description'   => t('Define the maximum description length passed through the link. Anything over 100 is excessive.'),
		'#title'         => t('Maximum description length'),
		'#default_value' => variable_get('social_share_max_desc_length', 50),
	);
	return system_settings_form($form);
}
