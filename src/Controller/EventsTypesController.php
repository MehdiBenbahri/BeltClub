<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EventsTypes Controller
 *
 * @property \App\Model\Table\EventsTypesTable $EventsTypes
 * @method \App\Model\Entity\EventsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $eventsTypes = $this->paginate($this->EventsTypes);

        $this->set(compact('eventsTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsType = $this->EventsTypes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('eventsType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsType = $this->EventsTypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventsType = $this->EventsTypes->patchEntity($eventsType, $this->request->getData());
            if ($this->EventsTypes->save($eventsType)) {
                $this->Flash->success(__('The events type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events type could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsType = $this->EventsTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsType = $this->EventsTypes->patchEntity($eventsType, $this->request->getData());
            if ($this->EventsTypes->save($eventsType)) {
                $this->Flash->success(__('The events type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events type could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsType = $this->EventsTypes->get($id);
        if ($this->EventsTypes->delete($eventsType)) {
            $this->Flash->success(__('The events type has been deleted.'));
        } else {
            $this->Flash->error(__('The events type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
