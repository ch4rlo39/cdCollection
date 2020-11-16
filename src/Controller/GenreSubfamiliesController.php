<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GenreSubfamilies Controller
 *
 * @property \App\Model\Table\GenreSubfamiliesTable $GenreSubfamilies
 *
 * @method \App\Model\Entity\GenreSubfamily[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GenreSubfamiliesController extends AppController
{   
    
    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
        $this->Auth->allow(['getByGenreFamily', 'add', 'edit', 'delete']);
    }
    
    public function getByGenreFamily(){
        $genre_family_id = $this->request->query('genre-family-id');
        
        $genreSubfamilies = $this->GenreSubfamilies->find('all', [
           'conditions' => ['GenreSubfamilies.genre_family_id' => $genre_family_id], 
        ]);
        $this->set('genreSubfamilies', $genreSubfamilies);
        $this->set('_serialize', ['genreSubfamilies']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['GenreFamilies'],
        ];
        $genreSubfamilies = $this->paginate($this->GenreSubfamilies);

        $this->set(compact('genreSubfamilies'));
    }

    /**
     * View method
     *
     * @param string|null $id Genre Subfamily id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genreSubfamily = $this->GenreSubfamilies->get($id, [
            'contain' => ['GenreFamilies', 'Genres'],
        ]);

        $this->set('genreSubfamily', $genreSubfamily);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genreSubfamily = $this->GenreSubfamilies->newEntity();
        if ($this->request->is('post')) {
            $genreSubfamily = $this->GenreSubfamilies->patchEntity($genreSubfamily, $this->request->getData());
            if ($this->GenreSubfamilies->save($genreSubfamily)) {
                $this->Flash->success(__('The genre subfamily has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre subfamily could not be saved. Please, try again.'));
        }
        $genreFamilies = $this->GenreSubfamilies->GenreFamilies->find('list', ['limit' => 200]);
        $this->set(compact('genreSubfamily', 'genreFamilies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Genre Subfamily id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genreSubfamily = $this->GenreSubfamilies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genreSubfamily = $this->GenreSubfamilies->patchEntity($genreSubfamily, $this->request->getData());
            if ($this->GenreSubfamilies->save($genreSubfamily)) {
                $this->Flash->success(__('The genre subfamily has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The genre subfamily could not be saved. Please, try again.'));
        }
        $genreFamilies = $this->GenreSubfamilies->GenreFamilies->find('list', ['limit' => 200]);
        $this->set(compact('genreSubfamily', 'genreFamilies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Genre Subfamily id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genreSubfamily = $this->GenreSubfamilies->get($id);
        if ($this->GenreSubfamilies->delete($genreSubfamily)) {
            $this->Flash->success(__('The genre subfamily has been deleted.'));
        } else {
            $this->Flash->error(__('The genre subfamily could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
