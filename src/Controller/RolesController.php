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
        if (AppController::$CURRENT_USER->role->is_admin) {
            $role = $this->Roles->newEmptyEntity();
            if ($this->request->is('post')) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());
                $role->active = 1;
                $role->is_orga = 1;
                $role->id_organisation = AppController::$CURRENT_USER->organisation->id;
                if ($this->Roles->save($role)) {
                    return $this->redirect($this->referer());
                }
                $this->Flash->error(__('Le rôle n\'a pas pu être enregistré. Veuillez réessayer.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error("Impossible de supprimer l'évènement (CHECK ORGA & ROLE = FALSE)");
                return $this->redirect($this->referer());
            }
        }
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
        if (AppController::$CURRENT_USER->organisation->id == $role->id_organisation && AppController::$CURRENT_USER->role->is_admin) {
            if ($this->request->is(['patch', 'post', 'put'])) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());
                if ($this->Roles->save($role)) {

                    return $this->redirect($this->referer());
                }
            }
            $this->set(compact('role'));
        }
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

        $role = $this->Roles->get($id);
        $id_orga = $role->id_organisation;

        if (AppController::$CURRENT_USER->organisation->id == $id_orga && AppController::$CURRENT_USER->role->is_admin) {
            $role = $this->Roles->get($id);
            $role->active = 0;
            $this->Roles->save($role);
            return $this->redirect($this->referer());
        } else {
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
        $role = $this->Roles->get($id);
        $id_orga = $role->id_organisation;
        if (AppController::$CURRENT_USER->organisation->id == $id_orga && AppController::$CURRENT_USER->role->is_admin) {
            $role->active = 1;
            $this->Roles->save($role);
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error("Impossible de réabilité l'évènement l'évènement (CHECK ORGA & ROLE = FALSE)");
            return $this->redirect($this->referer());
        }

    }
}
