<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property user_contacts $user_contacts
 * @property user_contacts $user_contacts
 */
class User extends AppModel {


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'users_contacts' => array(
			'className' => 'users_contacts',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
