<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Surveys Controller
 *
 * @property \App\Model\Table\SurveysTable $Surveys
 *
 * @method \App\Model\Entity\Survey[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SurveysController extends AppController
{
    public function initialize():void
    {
        parent::initialize();
               
        $this->Auth->allow(['index','view','add','edit','delete']);
    }
    
    public function isAuthorized($user = null) {
        $action = $this->request->getParam('action');
        $email = explode('@', $this->Auth->user('email'));
                
        //Seul un user possédant un email du domaine "sul.com" peut supprimer les sondages d'une catégorie
        if(strpos($email[1],'sull.com')!==false && in_array($action, ['deleteSurveysFromCategory'])) {
            return true;
        }
        
        //Interdire tout
        return false;
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $surveys = $this->paginate($this->Surveys);

        $this->set(compact('surveys'));
        $this->set(compact('user'));
    }

    /**
     * View method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => ['Users', 'Responses'],
        ]);

        $this->set('survey', $survey);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $survey = $this->Surveys->newEmptyEntity();
        if ($this->request->is('post')) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $users = $this->Surveys->Users->find('list', ['limit' => 200]);
        $responses = $this->Surveys->Responses->find('list', ['limit' => 200]);
        $this->set(compact('survey', 'users', 'responses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $survey = $this->Surveys->get($id, [
            'contain' => ['Responses'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $survey = $this->Surveys->patchEntity($survey, $this->request->getData());
            if ($this->Surveys->save($survey)) {
                $this->Flash->success(__('The survey has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The survey could not be saved. Please, try again.'));
        }
        $users = $this->Surveys->Users->find('list', ['limit' => 200]);
        $responses = $this->Surveys->Responses->find('list', ['limit' => 200]);
        $this->set(compact('survey', 'users', 'responses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Survey id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $survey = $this->Surveys->get($id);
        if ($this->Surveys->delete($survey)) {
            $this->Flash->success(__('The survey has been deleted.'));
        } else {
            $this->Flash->error(__('The survey could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * Suppression de tous les sondages de la categorie donnée
     * 
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to Category::index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteSurveysFromCategory($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $surveys = $this->Surveys->find('all')
                ->select(['id'])
                ->where(['category_id'=>$id]);
        
        $ids = [];
        foreach($surveys as $survey) {
            $ids[] = $survey->id;
        }
        
        $nbSurveys = count($ids);
        
        $category = $this->Surveys->Categories->get($id);
        
        if($nbSurveys) {
            if ($this->Surveys->deleteAll(['id IN' => $ids])) {
                $this->Flash->success(__('Catégorie "'.$category->nom.'" vidée : '
                    .$nbSurveys.($nbSurveys>1?' sondages supprimés.':' sondage supprimé.')));
            } else {
                $this->Flash->error(__('Erreur de suppression.'));
            }
        } else {
            $this->Flash->error(__('La catégorie est déjà vide.'));
        }

        return $this->redirect(['controller' => 'categories','action' => 'index']);
    }
}
