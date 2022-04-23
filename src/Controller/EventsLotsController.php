<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EventsLots Controller
 *
 * @property \App\Model\Table\EventsLotsTable $EventsLots
 * @method \App\Model\Entity\EventsLot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsLotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $eventsLots = $this->paginate($this->EventsLots);

        $this->set(compact('eventsLots'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Lot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsLot = $this->EventsLots->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('eventsLot'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsLot = $this->EventsLots->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventsLot = $this->EventsLots->patchEntity($eventsLot, $this->request->getData());
            if ($this->EventsLots->save($eventsLot)) {
                $this->Flash->success(__('The events lot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events lot could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsLot'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Lot id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsLot = $this->EventsLots->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsLot = $this->EventsLots->patchEntity($eventsLot, $this->request->getData());
            if ($this->EventsLots->save($eventsLot)) {
                $this->Flash->success(__('The events lot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events lot could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsLot'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Lot id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsLot = $this->EventsLots->get($id);
        if ($this->EventsLots->delete($eventsLot)) {
            $this->Flash->success(__('The events lot has been deleted.'));
        } else {
            $this->Flash->error(__('The events lot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
