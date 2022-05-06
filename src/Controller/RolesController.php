<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Role;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('role'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEmptyEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $id_orga =  $this->fetchTable("Users")->find('all')->where(["id_role" => $id])->contain(["Organisations"])->first()->organisation->id;
        if (AppController::$CURRENT_USER->organisation->id == $id_orga){
            $role = $this->Roles->get($id);
            $role->active = 0;
            $this->Roles->save($role);
            return $this->redirect($this->referer());
        }
        else{
            $this->Flash->error("Impossible de supprimer l'évènement (CHECK ORGA & ROLE = FALSE)");
            return $this->redirect($this->referer());
        }

    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function reabilite($id = null)
    {
        $id_orga =  $this->fetchTable("Users")->find('all')->where(["id_role" => $id])->contain(["Organisations"])->first()->organisation->id;
        if (AppController::$CURRENT_USER->organisation->id == $id_orga){

            $role = $this->Roles->get($id);
            $role->active = 1;
            $this->Roles->save($role);
            return $this->redirect($this->referer());
        }
        else{
            $this->Flash->error("Impossible de réabilité l'évènement l'évènement (CHECK ORGA & ROLE = FALSE)");
            return $this->redirect($this->referer());
        }

    }
}
