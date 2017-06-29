<?php

App::uses('AppController','Controller');

class UsersController extends AppController {

    public $components = array('Session');

	public function register() {

		if (isset($this->request->data)) {
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
                
			}
			else {
				$this->Session->setFlash('Thông tin đăng kí không hợp lệ ! Vui lòng thử lại');
			}
		}
		
	}
}