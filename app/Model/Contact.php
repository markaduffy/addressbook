<?php
App::uses('AppModel', 'Model');
/**
 * Addressbook Model
 *
 */
class Contact extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'contacts';

	public $belongsTo = 'User';

}
