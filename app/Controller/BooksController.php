<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 * @property PaginatorComponent $Paginator
 */
class BooksController extends AppController {

 

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
		
        // Get 12 best-selling books
		$hot_book = $this->Book->find('all',array(
				                                 'limit' => 12,
				                                 'conditions' => array('hot' => 1)
		                                    )
				                 );
		
		//Get books by category
		$this->loadModel('Category');
		$list_category = $this->Category->find('all');
		$list_book_category = $this->Book->find('all',array(
						                                 'order' => 'Book.created DESC',
						                                 'conditions' => array(
						                                 		             'NOT' => array('Book.hot' => 1)
						                                                 )
		                                    		  )
				                 		    );
		
		$this->set(compact('hot_book', 'list_book_category', 'list_category'));
	}

/**
 * view method
 * @param string $slug
 * @return void
 */
	public function view($slug = null) {
		
		//get book info by slug
		$book_info = $this->Book->find('first',array('conditions' => array('Book.slug' => $slug)));
		
		//get related books
		$category_id = $book_info['Book']['category_id'];
		$related_books = $this->Book->find('all',array(
				                                      'conditions' => array(
				                                      		               'Book.category_id' => $category_id,
				                                      		               'NOT' => array('Book.slug' => $slug)
				                                                      ),
				                                       'limit' => 4
				 
		 										)
									    );
        //get all comment of book
        $this->loadModel('Comment');
        $book_id = $book_info['Book']['id'];
		$comments = $this->Comment->find('all',array(
				                                    'conditions' => array(
				                                      		              'Comment.book_id' => $book_id,
				                                                    ),
				                                    'order' => 'Comment.id DESC'
		 										)
									    );

		$this->set(compact('book_info' , 'related_books' , 'comments'));
	}

/**
 * search method
 *
 * @return void
 */

	public function search() {

		if (isset($this->data['book']['keyword'])) {
            if ($this->Session->check('keyword')) {
                $this->Session->delete('keyword');
                $this->Session->write('keyword',$this->data['book']['keyword']);
            }
            else {
                $this->Session->write('keyword',$this->data['book']['keyword']);
            }
        }
        else {
            if (!strpos($_SERVER['REQUEST_URI'], '/search/')) {
                $this->Session->delete('keyword');
            }
        }

        if ($this->Session->check('keyword')) {
            $keyword = $this->Session->read('keyword');
            
            $this->paginate = array(
                                'limit' => 4,// mỗi page có 4 record
                                'order' => array('id' => 'desc'),//giảm dần theo id
                                'conditions' => array(
                                                    'Book.title LIKE' => '%' . $keyword . '%'
                                                )
                            );

            $book_search = $this->paginate('Book');
            $this->set("book_search",$book_search);   
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Book->exists($id)) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Book.' . $this->Book->primaryKey => $id));
			$this->request->data = $this->Book->find('first', $options);
		}
		$categories = $this->Book->Category->find('list');
		$writers = $this->Book->Writer->find('list');
		$this->set(compact('categories', 'writers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('The book has been deleted.'));
		} else {
			$this->Session->setFlash(__('The book could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
