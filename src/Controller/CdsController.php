<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cds Controller
 *
 * @property \App\Model\Table\CdsTable $Cds
 *
 * @method \App\Model\Entity\Cd[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CdsController extends AppController
{
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
        if(in_array($action, ['add'])){
            if($user['confirmed'] == 1){
                return true;
            } else {
                return false;
            }
        }
        
        if($user['role_id'] == 1) {
            return true;
        }
        
        
        $slug = $this->request->getParam('pass.0');
        if(!$slug) {
            return false;
        }
        
        $cd = $this->Cds->findBySlug($slug)->first();
        
        return $cd->user_id === $user['id'];
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Covers'],
        ];
        $cds = $this->paginate($this->Cds);

        $this->set(compact('cds'));
    }

    /**
     * View method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $cd = $this->Cds->find()->where(['Cds.slug' => $slug]) -> contain(['Reviews', 'Users', 'Genres', 'Covers']) -> firstOrFail();
        $this->set(compact('cd'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cd = $this->Cds->newEntity();
        if ($this->request->is('post')) {
            $cd = $this->Cds->patchEntity($cd, $this->request->getData());
            
            $cd->user_id = $this->Auth->user('id');
            
            if ($this->Cds->save($cd)) {
                $this->Flash->success(__('The cd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cd could not be saved. Please, try again.'));
        }
        $users = $this->Cds->Users->find('list', ['limit' => 200]);
        $genres = $this->Cds->Genres->find('list', ['limit' => 200]);
        $covers = $this->Cds->Covers->find('list', ['limit' => 200]);
        $this->set(compact('cd', 'users', 'genres', 'covers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug)
    {
        $cd = $this->Cds->findBySlug($slug)->contain('Genres')->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Cds->patchEntity($cd, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Cds->save($cd)) {
                $this->Flash->success(__('The cd has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cd could not be saved. Please, try again.'));
        }
        $users = $this->Cds->Users->find('list', ['limit' => 200]);
        $genres = $this->Cds->Genres->find('list', ['limit' => 200]);
        $covers = $this->Cds->Covers->find('list', ['limit' => 200]);
        $this->set(compact('cd', 'users', 'genres', 'covers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cd = $this->Cds->findBySlug($slug)->firstOrFail();
        if ($this->Cds->delete($cd)) {
            $this->Flash->success(__('The cd has been deleted.'));
        } else {
            $this->Flash->error(__('The cd could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
