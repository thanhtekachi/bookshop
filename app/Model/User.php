<?php

App::uses('AppModel','Model');

class User extends AppModel {

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
												      "nameFormat" => array(
														                   "rule" => '/^[a-z0-9]{4,20}$/i',
														                   "message" => "Tên username phải là chữ và số, trong khoảng 4-20 kí tự",
														              ),
												      "checkUsername" => array(
														                      "rule" => 'checkUsername',
														                      "message" => "Username này đã được đăng kí ! Vui lòng thử lại",
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
													'checkEmail' => array(
														                  'rule' => 'checkEmail',
														                   'message' => 'Email này đã được sử dụng ! Vui lòng thử lại',
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
												     'checkPhoneNumber' => array(
														                        'rule' => 'checkPhoneNumber',
														                        'message' => 'Số điện thoại này đã được sử dụng ! Vui lòng thử lại',
														                   ),
		                                        ),
	                );
    
    function checkUsername() {

    	$username = $this->data['User']['username'];
    	$check = $this->find('all',array(
				                         'conditions' => array('username' => $username)
		                           )
				            );
	    if (count($check) > 0) {
	    	return false;
	    } else {
	    	return true;
		}
	}
    
    function checkEmail(){

    	$email = $this->data['User']['email'];
    	$check = $this->find('all',array(
				                         'conditions' => array('email' => $email)
		                           )
				            );
	    if (count($check) > 0) {
	    	return false;
	    } else {
	    	return true;
		}
	}
	
	function checkPhoneNumber(){

    	$phone_number = $this->data['User']['phone_number'];
    	$check = $this->find('all',array(
				                         'conditions' => array('phone_number' => $phone_number)
		                           )
				            );
	    if (count($check) > 0) {
	    	return false;
	    } else {
	    	return true;
		}
	}
}