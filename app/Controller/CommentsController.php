<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = false;
		$this->autoRender = false;
		
		if ($this->request->is('ajax')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
                //get id of comment just add 
				$id_comment = $this->Comment->id;
				//get count comment of this book
				$count_comment = $this->Comment->find('count', array('conditions' => array('Comment.book_id' => $this->request->data['book_id'])
					                                          
					                                    )
				                          );
				//get user info have just comment
				$this->loadModel('User');
				$user_info = $this->User->find('first', array('conditions' => array('User.id' => $this->request->data['user_id'])
					                                          
					                                    )
				                          );
				
				echo json_encode(array('user_name' => $user_info['User']['username'], 'count_comment' => $count_comment, 'id_comment' => $id_comment));
			}
		}
		
	}

/**
 * loadMoreComment method
 * it will show maximum 5 comments after one click "load more"
 * @return comment of current page , the remain of comment
 */
	public function loadMoreComment() {

        $this->layout = false;
		$this->autoRender = false;
		//total comment of book
		$total_comment = $result = $this->Comment->find('count',array(
				                                                    'conditions' => array('Comment.book_id' => $this->request->data['book_id'])
				                                              )
		                                                );

		if ($this->request->is('ajax')) {
			$page = $this->request->data['page'];
			//get comment in this page
			$result = $this->Comment->find('all',array(
				                                      'conditions' => array('Comment.book_id' => $this->request->data['book_id']),
				                                      'limit' => 5,
				                                      'offset' => $page*5, 
				                                      'order'  => 'Comment.id DESC'
				                                )
		                              );
			//total comment remain
            $comment_remain = $total_comment - $page*5 - count($result);

			echo json_encode(array('comment' => $result, 'comment_remain' => $comment_remain));
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$books = $this->Comment->Book->find('list');
		$this->set(compact('users', 'books'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @return void
 */
	public function delete() {
		
		$this->layout = false;
		$this->autoRender = false;
		if ($this->request->is('ajax')) {
			$this->Comment->id = $this->request->data['comment_id'];
			if ($this->Comment->delete()) {
			    $comment = $this->Comment->find('all',array(
				                                            'conditions' => array('Comment.book_id' => $this->request->data['book_id']),
				                                        	'limit' => 5,
				                                        	'order' => 'Comment.id DESC'
				                                	)
		                                	);
			    echo json_encode(array('comment' => $comment));
		    } 
		}
	}
}
