<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Covers Controller
 *
 * @property \App\Model\Table\CoversTable $Covers
 *
 * @method \App\Model\Entity\Cover[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CoversController extends AppController
{
    
     public function initialize() {
         parent::initialize();
         $this->Auth->allow('add');
         $this->viewBuilder()->setLayout('cakephp_default');
     }
     
     public function isAuthorized($user){
         return true;
     }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $covers = $this->paginate($this->Covers);

        $this->set(compact('covers'));
    }

    /**
     * View method
     *
     * @param string|null $id Cover id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cover = $this->Covers->find()->where(['Covers.id' => $id])->contain(['Cds'])->firstOrFail();

        $this->set(compact('cover'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cover = $this->Covers->newEntity();
        if ($this->request->is('post') or $this->request->is('ajax')) {
            $coverRequest = $this->request->getData();
            if(!empty($coverRequest['file']['name'])){
                $fileName = $coverRequest['file']['name'];
                $uploadPath = 'covers/add/';
                $uploadFile = $uploadPath . $fileName;
                if(move_uploaded_file($coverRequest['file']['tmp_name'], 'img/' . $uploadFile)){
                    $cover = $this->Covers->newEntity();
                    $cover->name = $fileName;
                    $cover->path = $uploadPath;
                    if($this->Covers->save($cover)){
                        $this->Flash->success(__('The cover has been uploaded and inserted successfully.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Unable to upload cover, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload cover, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a cover (file) to upload.'));
            }
        }
        $cds = $this->Covers->Cds->find('list', ['limit' => 200]);
        $this->set(compact('cover', 'cds'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cover id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cover = $this->Covers->get($id, [
            'contain' => ['Cds'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cover = $this->Covers->patchEntity($cover, $this->request->getData());
            if ($this->Covers->save($cover)) {
                $this->Flash->success(__('The cover has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cover could not be saved. Please, try again.'));
        }
        $cds = $this->Covers->Cds->find('list', ['limit' => 200]);
        $this->set(compact('cover', 'cds'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cover id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cover = $this->Covers->get($id);
        if ($this->Covers->delete($cover)) {
            $this->Flash->success(__('The cover has been deleted.'));
        } else {
            $this->Flash->error(__('The cover could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
