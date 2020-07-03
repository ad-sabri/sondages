<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize():void
    {
        parent::initialize();
        
        $this->Auth->allow(['logout']);
    }
    
    public function isAuthorized($user = null) {
        //Autoriser seulement les méthodes view et edit
        $action = $this->request->getParam('action');
        
        if(in_array($action, ['view','edit','changePassword'])) {
            return true;
        }
        
        //Seul le user "marc" (id 1 => admin) a le droit de supprimer un user
        if($this->Auth->user('id')==1 && in_array($action, ['delete','index'])) {
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
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //On ne peut consulter que son profil
        if($this->Auth->user('id')==$id) {
            $user = $this->Users->get($id, [
                'contain' => ['Surveys'],
            ]);

            $this->set('user', $user);
        } else {
            //Redirection
            $this->Flash->error(__('Vous n\'êtes pas autorisé à voir ce profil!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('id')==$id) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            $this->set(compact('user'));
        } else {
            //Redirection
            $this->Flash->error(__('Vous n\'êtes pas autorisé à voir ce profil!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
        }
    }
    
    public function logout()
    {
        $this->Flash->success('Vous avez été déconnecté.');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Permet de modifier le mot de passe de l'utilisateur connecté
     * 
     * @param int $id Id de l'utilisateur
     */
    public function changePassword($id = null)
    {
       if($this->Auth->user('id')==$id) {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                
                $new_password = $this->request->getData('new_password');
                $confirm_password = $this->request->getData('confirm_password');
                
                if($new_password==$confirm_password) {
                    $user->password = $new_password;

                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                } else {
                    $this->Flash->error(__("The 2 passwords don't match."));
                }
            }
            $this->set(compact('user'));
            $this->render('edit');
        } else {
            //Redirection
            $this->Flash->error(__('Vous n\'êtes pas autorisé à voir ce profil!'));
            return $this->redirect($this->referer());
        }
    }
}
