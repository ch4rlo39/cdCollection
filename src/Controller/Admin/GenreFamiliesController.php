<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * GenreFamilies Controller
 *
 * @property \App\Model\Table\GenreFamiliesTable $GenreFamilies
 *
 * @method \App\Model\Entity\GenreFamily[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GenreFamiliesController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->Auth->deny(['view','index', 'add', 'edit', 'delete']);
        //$this->viewBuilder()->setLayout('cakephp_default_admin');
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
        $genreFamilies = $this->paginate($this->GenreFamilies);

        $this->set(compact('genreFamilies'));
    }

    /**
     * View method
     *
     * @param string|null $id Genre Family id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genreFamily = $this->GenreFamilies->get($id, [
            'contain' => ['GenreSubfamilies', 'Genres'],
        ]);

        $this->set('genreFamily', $genreFamily);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genreFamily = $this->GenreFamilies->newEntity();
        if ($this->request->is('post')) {
            $genreFamily = $this->GenreFamilies->patchEntity($genreFamily, $this->request->getData());
            if ($this->GenreFamilies->save($genreFamily)) {
                $this->Flash->success(__('The genre family has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre family could not be saved. Please, try again.'));
        }
        $this->set(compact('genreFamily'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Genre Family id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genreFamily = $this->GenreFamilies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genreFamily = $this->GenreFamilies->patchEntity($genreFamily, $this->request->getData());
            if ($this->GenreFamilies->save($genreFamily)) {
                $this->Flash->success(__('The genre family has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre family could not be saved. Please, try again.'));
        }
        $this->set(compact('genreFamily'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Genre Family id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genreFamily = $this->GenreFamilies->get($id);
        if ($this->GenreFamilies->delete($genreFamily)) {
            $this->Flash->success(__('The genre family has been deleted.'));
        } else {
            $this->Flash->error(__('The genre family could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
