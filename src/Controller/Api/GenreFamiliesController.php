<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

class GenreFamiliesController extends AppController {
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index']);
    }
    
    public function index() {
        $genreFamilies = $this->GenreFamilies->find('all');
        $this->set([
           'genreFamilies' => $genreFamilies,
           '_serialize' => ['genreFamilies']
        ]);
    }
    
    public function view($id) {
        $genreFamily = $this->GenreFamilies->get($id);
        $this->set([
           'genreFamily' => $genreFamily,
           '_serialize' => ['genreFamily']
        ]);
    }
    
    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $genreFamily = $this->GenreFamilies->newEntity($this->request->getData());
        if($this->GenreFamilies->save($genreFamily)){
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        
        $this->set([
           'message' => $message,
           'genreFamily' => $genreFamily,
           '_serialize' => ['message', 'genreFamily']
        ]);
    }
    
    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $genreFamily = $this->GenreFamilies->get($id);
        $genreFamily = $this->GenreFamilies->patchEntity($genreFamily, $this->request->getData());
        if($this->GenreFamilies->save($genreFamily)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
           'message' => $message,
           '_serialize' => ['message']
        ]);
    }
    
    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $genreFamily = $this->GenreFamilies->get($id);
        $message = 'Deleted';
        if(!$this->GenreFamilies->delete($genreFamily)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
        
    }
}

