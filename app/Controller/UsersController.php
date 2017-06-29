<?php

App::uses('AppController','Controller');

class UsersController extends AppController {

	public function register() {

		if (isset($this->request->data['User'])) {
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				
                $data = array(
							'group_id'=> 2,
							'lastname' => $this->request->data['User']['lastname'],
							'firstname' => $this->request->data['User']['firstname'],
							'username' => $this->request->data['User']['username'],
							'password' => $this->request->data['User']['password'],
							'email' => $this->request->data['User']['email'],
							'address' => $this->request->data['User']['address'],
							'phone_number' => $this->request->data['User']['phone_number']
					    );
                
				if ($this->User->saveAll($data)) {
					$this->redirect('/');
				} else {
					$this->Session->setFlash('Đăng ký bị lỗi!', 'default', array('class'=>'alert alert-danger'));
				}
			}
			else {
				$this->Session->setFlash('Thông tin đăng kí không hợp lệ ! Vui lòng thử lại');
			}
		}
		
	}

}