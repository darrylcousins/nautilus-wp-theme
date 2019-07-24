<?php
if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * Contact
 * Template for WPForms.
 */
class WPForms_Template_contact extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Contact';

		// Template slug
		$this->slug = 'contact';

		// Template description
		$this->description = '';

		// Template field and settings
		$this->data = array (
	'field_id' => 3,
	'fields' => array (
		0 => array (
			'id' => '0',
			'type' => 'name',
			'label' => 'Name',
			'format' => 'first-last',
			'required' => '1',
			'size' => 'medium',
		),
		1 => array (
			'id' => '1',
			'type' => 'email',
			'label' => 'Email',
			'required' => '1',
			'size' => 'medium',
		),
		2 => array (
			'id' => '2',
			'type' => 'textarea',
			'label' => 'Comment or Message',
			'required' => '1',
			'size' => 'medium',
		),
	),
	'settings' => array (
		'form_title' => 'Contact',
		'submit_text' => 'Submit',
		'submit_text_processing' => 'Sending...',
		'honeypot' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'email' => '{admin_email}',
				'subject' => 'New Entry: Contact',
				'sender_name' => 'Nautilus Braids',
				'sender_address' => '{admin_email}',
				'replyto' => '{field_id="1"}',
				'message' => '{all_fields}',
			),
		),
		'confirmations' => array (
			1 => array (
				'type' => 'message',
				'message' => '<p>Thanks for contacting us! We will be in touch with you shortly.</p>',
				'message_scroll' => '1',
				'page' => '18',
			),
		),
	),
	'meta' => array (
		'template' => 'contact',
	),
);
	}
}
new WPForms_Template_contact;
endif;
?>
