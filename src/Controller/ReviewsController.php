<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reviews Controller
 *
 * @property \App\Model\Table\ReviewsTable $Reviews
 *
 * @method \App\Model\Entity\Review[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReviewsController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add']);
    }
    
    public function isAuthorized($user) {
        return true;
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cds'],
        ];
        $reviews = $this->paginate($this->Reviews);

        $this->set(compact('reviews'));
    }

    /**
     * View method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => ['Cds'],
        ]);

        $this->set('review', $review);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   if($this->request->session()->read('Cd.id') == false){
        $this->Flash->error(__('Review must be added from a CD'));
        return $this->redirect(['controller' => 'cds', 'action' => 'index']);
    } else {
        $review = $this->Reviews->newEntity();
        if ($this->request->is('post')) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            $review->cd_id = $this->request->session()->read('Cd.id');
            $this->request->session()->delete('Cd.id');
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));
                $cd_slug = $this->request->session()->read('Cd.slug');
                return $this->redirect(['controller'=> 'cds', 'action' => 'view', $cd_slug]);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $cds = $this->Reviews->Cds->find('list', ['limit' => 200]);
        $this->set(compact('review', 'cds'));
    }
    }

    /**
     * Edit method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $review = $this->Reviews->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $review = $this->Reviews->patchEntity($review, $this->request->getData());
            if ($this->Reviews->save($review)) {
                $this->Flash->success(__('The review has been saved.'));
                $cd_slug = $this->request->session()->read('Cd.slug');
                return $this->redirect(['controller' => 'cds' ,'action' => 'view', $cd_slug]);
            }
            $this->Flash->error(__('The review could not be saved. Please, try again.'));
        }
        $cds = $this->Reviews->Cds->find('list', ['limit' => 200]);
        $this->set(compact('review', 'cds'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Review id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $review = $this->Reviews->get($id);
        if ($this->Reviews->delete($review)) {
            $this->Flash->success(__('The review has been deleted.'));
        } else {
            $this->Flash->error(__('The review could not be deleted. Please, try again.'));
        }
        $cd_slug = $this->request->session()->read('Cd.slug');
        return $this->redirect(['controller' => 'cds' ,'action' => 'view', $cd_slug]);
    }
}
