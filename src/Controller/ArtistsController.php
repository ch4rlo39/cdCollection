<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Artists Controller
 *
 * @property \App\Model\Table\ArtistsTable $Artists
 *
 * @method \App\Model\Entity\Artist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtistsController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findArtists', 'add', 'edit', 'delete']);
    }
    
    public function findArtists() {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Artists->find('all', array(
               'conditions' => array('Artists.name LIKE ' => '%' . $name . '%') 
            ));
            
            $resultArr = array();
            foreach($results as $result) {
                $resultArr[] = array('label' =>$result['name'], 'value' => $result ['id']);
            }
            echo json_encode($resultArr);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $artists = $this->paginate($this->Artists);

        $this->set(compact('artists'));
    }

    /**
     * View method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artist = $this->Artists->get($id, [
            'contain' => ['Cds'],
        ]);

        $this->set('artist', $artist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artist = $this->Artists->newEntity();
        if ($this->request->is('post')) {
            $artist = $this->Artists->patchEntity($artist, $this->request->getData());
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist could not be saved. Please, try again.'));
        }
        $this->set(compact('artist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artist = $this->Artists->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artist = $this->Artists->patchEntity($artist, $this->request->getData());
            if ($this->Artists->save($artist)) {
                $this->Flash->success(__('The artist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist could not be saved. Please, try again.'));
        }
        $this->set(compact('artist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artist = $this->Artists->get($id);
        if ($this->Artists->delete($artist)) {
            $this->Flash->success(__('The artist has been deleted.'));
        } else {
            $this->Flash->error(__('The artist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
