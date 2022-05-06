<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        //$this->Authentication->addUnauthenticatedActions(['login','display','index','view']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /articles après la connexion réussie
            $redirect = $this->request->getQuery('redirect', '/');
            return $this->redirect($redirect);
        }
        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect('/');
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->Authentication->getIdentity()){
            $user = $this->Users->newEmptyEntity();
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => false]);
                if ($this->Users->save($user)) {

                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('L\'utilisateur n\'a pas pu être enregistrer. Contactez l\'administrateur.'));
            }
            //$discords = $this->Users->Discords->find('list', ['limit' => 200])->all();

            $this->set(compact('user'));
        }
        else{
            $this->Flash->error(__('Vous devez être connecté pour accéder à cette page'));
            return $this->redirect("/");
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($this->Authentication->getIdentity()){
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'utilisateur n\'a pas pu être enregistrer. Contactez l\'administrateur.'));
        }
        //$discords = $this->Users->Discords->find('list', ['limit' => 200])->all();
            $this->set(compact('user'));
        }
        else{
            $this->Flash->error(__('Vous devez être connecté pour accéder à cette page'));
            return $this->redirect("/");
        }
    }
    /**
     * Return true if the current user is allowed to edit or delete the targeted user
     *
     * @param User $user targeted user entity (must contain orga and role).
     * @return Boolean true if the current user is allowed false otherwise
     */
    public static function isAllowedToEditOrDelete($target_user){
        //check level
        if ($target_user->role->level > AppController::$CURRENT_USER->role->level){
            return false;
        }
        if ($target_user->organisation->id != AppController::$CURRENT_USER->organisation->id){
            return false;
        }

        if ($target_user->id == AppController::$CURRENT_USER->id){
            return false;
        }
        return true;
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user_to_delete = $this->Users->findById($id)->contain(["Organisations","Roles"])->first();
        if (!$user_to_delete){
            $this->Flash->error(__('Utilisateur non valide'));
            return $this->redirect(['action' => 'index']);
        }
        if (AppController::$CURRENT_USER){
            if ($this->isAllowedToEditOrDelete($user_to_delete)){
                $user_to_delete->active = 0;
                $this->Users->save($user_to_delete);
            } else {
                $this->Flash->error(__('Vous n\'avez pas le niveau de droit nécessaire et suffisant pour effectuer cette action.'));
                return $this->redirect($this->referer());
            }
            return $this->redirect($this->referer());
        }
        else{
            $this->Flash->error(__('Vous devez être connecté pour accéder à cette page'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * un delete user method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function reabilite($id = null)
    {
        $user_to_delete = $this->Users->findById($id)->contain(["Organisations","Roles"])->first();
        if (!$user_to_delete){
            $this->Flash->error(__('Utilisateur non valide'));
            return $this->redirect(['action' => 'index']);
        }
        if (AppController::$CURRENT_USER){
            if ($this->isAllowedToEditOrDelete($user_to_delete)){
                $user_to_delete->active = 1;
                $this->Users->save($user_to_delete);
            } else {
                $this->Flash->error(__('Vous n\'avez pas le niveau de droit nécessaire et suffisant pour effectuer cette action.'));
                return $this->redirect($this->referer());
            }
            return $this->redirect($this->referer());
        }
        else{
            $this->Flash->error(__('Vous devez être connecté pour accéder à cette page'));
            return $this->redirect($this->referer());
        }
    }
}
