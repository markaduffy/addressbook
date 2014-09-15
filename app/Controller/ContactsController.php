<?php
App::uses('AppController', 'Controller');
/**
 * Addressbooks Controller
 *
 * @property Addressbook $Addressbook
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'RequestHandler','Cookie');

	public $uses = array('User', 'Contact');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$title_for_layout = "Address Book - Contacts";

		if ($this->Cookie->read('address_book_user_id')){
			$contacts = $this->Contact->find('all', array(
		       'conditions' => array('Contact.user_id =' => $this->Cookie->read('address_book_user_id')),
		       'order' => array('Contact.id' => 'desc')
		    ));
		    $user_id = $this->Cookie->read('address_book_user_id');
		}

		$state_list = array('options' => array(
				'Alabama' => 'Alabama',
				'Alaska' => 'Alaska',
				'Arizona' => 'Arizona',
				'Arkansas' => 'Arkansas',
				'California' => 'California',
				'Colorado' => 'Colorado',
				'Connecticut' => 'Connecticut',
				'Delaware' => 'Delaware',
				'Florida' => 'Florida',
				'Georgia' => 'Georgia',
				'Hawaii' => 'Hawaii',
				'Idaho' => 'Idaho',
				'Illinois' => 'Illinois',
				'Indiana' => 'Indiana',
				'Iowa' => 'Iowa',
				'Kansas' => 'Kansas',
				'Kentucky' => 'Kentucky',
				'Louisiana' => 'Louisiana',
				'Maine' => 'Maine',
				'Maryland' => 'Maryland',
				'Massachusetts' => 'Massachusetts',
				'Michigan' => 'Michigan',
				'Minnesota' => 'Minnesota',
				'Mississippi' => 'Mississippi',
				'Missouri' => 'Missouri',
				'Montana' => 'Montana',
				'Nebraska' => 'Nebraska',
				'Nevada' => 'Nevada',
				'New Hampshire' => 'New Hampshire',
				'New Jersey' => 'New Jersey',
				'New Mexico' => 'New Mexico',
				'New York' => 'New York',
				'North Carolina' => 'North Carolina',
				'North Dakota' => 'North Dakota',
				'Ohio' => 'Ohio',
				'Oklahoma' => 'Oklahoma',
				'Oregon' => 'Oregon',
				'Pennsylvania' => 'Pennsylvania',
				'Rhode Island' => 'Rhode Island',
				'South Carolina' => 'South Carolina',
				'South Dakota' => 'South Dakota',
				'Tennessee' => 'Tennessee',
				'Texas' => 'Texas',
				'Utah' => 'Utah',
				'Vermont' => 'Vermont',
				'Virginia' => 'Virginia',
				'Washington' => 'Washington',
				'West Virginia' => 'West Virginia',
				'Wisconsin' => 'Wisconsin',
				'Wyoming' => 'Wyoming',
				'District of Columbia' => 'District of Columbia',
				'Puerto Rico' => 'Puerto Rico',
				'Guam' => 'Guam',
				'American Samoa' => 'American Samoa',
				'U.S. Virgin Islands' => 'U.S. Virgin Islands',
				'Northern Mariana Islands' => 'Northern Mariana Islands'
			));

		$this->set(compact('title_for_layout','contacts', 'user_id','state_list'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$this->loadModel('Curl');
		$this->layout='ajax';
		$this->render(false);

		if ($this->request->is('post')){

			$address = "";
			$address .= $this->request->data['Contact']['address1'] . " ";
			$address .= $this->request->data['Contact']['address2'] . " ";
			$address .= $this->request->data['Contact']['city'] . " ";
			$address .= $this->request->data['Contact']['state'] . " ";
			$address .= $this->request->data['Contact']['zip'];

			$address = urlencode($address);

			$url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key=AIzaSyDE1aGUYiNxysXDYIlJrW7Ze52SIEF5N28';

			$this->Curl->url = $url;
			$this->Curl->followLocation = true;
			$this->Curl->userAgent = 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36'; 
			
			if ($response = json_decode($this->Curl->execute())){
				$this->request->data['Contact']['lat'] = $response->results[0]->geometry->location->lat;
				$this->request->data['Contact']['lng'] = $response->results[0]->geometry->location->lng;
			}

			$this->Contact->create();

			if ($this->RequestHandler->isAjax()){
				
				if ($this->Contact->save($this->request->data)) {
					echo json_encode($this->request->data);
				} else {
					echo json_encode(array("error" => 1));
				}

			} else {

				if ($this->Contact->save($this->request->data)) {
					return $this->redirect(array('controller' => 'contacts', 'action' => 'index'));
				}


			}

		}

	}

/**
 * add method
 *
 * @return void
 */
	public function map() {

		$title_for_layout = "Address Book - Map";

		if ($this->Cookie->read('address_book_user_id')){
			$contacts = $this->Contact->find('all', array(
		       'conditions' => array('Contact.user_id =' => $this->Cookie->read('address_book_user_id')),
		       'order' => array('Contact.id' => 'desc')
		    ));
		    $user_id = $this->Cookie->read('address_book_user_id');
		}

		$this->set(compact('title_for_layout','contacts','user_id'));

	}

}