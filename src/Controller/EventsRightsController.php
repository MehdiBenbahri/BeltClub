<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EventsRights Controller
 *
 * @property \App\Model\Table\EventsRightsTable $EventsRights
 * @method \App\Model\Entity\EventsRight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsRightsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $eventsRights = $this->paginate($this->EventsRights);

        $this->set(compact('eventsRights'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Right id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsRight = $this->EventsRights->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('eventsRight'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsRight = $this->EventsRights->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventsRight = $this->EventsRights->patchEntity($eventsRight, $this->request->getData());
            if ($this->EventsRights->save($eventsRight)) {
                $this->Flash->success(__('The events right has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events right could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsRight'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Right id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsRight = $this->EventsRights->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsRight = $this->EventsRights->patchEntity($eventsRight, $this->request->getData());
            if ($this->EventsRights->save($eventsRight)) {
                $this->Flash->success(__('The events right has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events right could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsRight'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Right id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsRight = $this->EventsRights->get($id);
        if ($this->EventsRights->delete($eventsRight)) {
            $this->Flash->success(__('The events right has been deleted.'));
        } else {
            $this->Flash->error(__('The events right could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
