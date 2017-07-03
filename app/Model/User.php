<?php

App::uses('AppModel','Model');

class User extends AppModel {

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

	public $validate = array(
							'firstname'     =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
		                                        ),
							'lastname'      =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
		                                        ),
							'username'      =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
												     'nameFormat' => array(
														                   "rule" => '/^[a-z0-9]{4,20}$/i',
														                   "message" => "Tên username phải là chữ và số, trong khoảng 4-20 kí tự",
														             ),
												     'unique' => array(
																	   'rule'=> 'isUnique',
																	   'message'=>'Username này đã được sử dụng ! Vui lòng thử lại'
																 ),
		                                        ),
							'password'      =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
		                                        ),
							'email'         =>  array(
													 'notEmpty' => array(
																		'rule' => array('notEmpty'),
																		'message' => 'Trường này không được để trống',
																   ),
													 'emailFormat' => array(
													                       'rule' => array('email', true),
													                       'message' => 'Vui lòng nhập đúng định dạng',
		           												      ),
													 'unique' => array(
																	  'rule'=> 'isUnique',
																	  'message'=>'Email này đã được sử dụng ! Vui lòng thử lại'
																 ),
		                                        ),
							'address'       =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
		                                        ),
							'phone_number'  =>  array(
												     'notEmpty' => array(
																	    'rule' => array('notEmpty'),
																	    'message' => 'Trường này không được để trống',
															       ),
												     'unique' => array(
																	  'rule'=> 'isUnique',
																	  'message'=>'Số điện thoại này đã được sử dụng ! Vui lòng thử lại'
																 ),
		                                        ),
	                );
    
}