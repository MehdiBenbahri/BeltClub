<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * EventsDescriptions Controller
 *
 * @property \App\Model\Table\EventsDescriptionsTable $EventsDescriptions
 * @method \App\Model\Entity\EventsDescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsDescriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $eventsDescriptions = $this->paginate($this->EventsDescriptions);

        $this->set(compact('eventsDescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Events Description id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsDescription = $this->EventsDescriptions->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('eventsDescription'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsDescription = $this->EventsDescriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $eventsDescription = $this->EventsDescriptions->patchEntity($eventsDescription, $this->request->getData());
            if ($this->EventsDescriptions->save($eventsDescription)) {
                $this->Flash->success(__('The events description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events description could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsDescription'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Description id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsDescription = $this->EventsDescriptions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsDescription = $this->EventsDescriptions->patchEntity($eventsDescription, $this->request->getData());
            if ($this->EventsDescriptions->save($eventsDescription)) {
                $this->Flash->success(__('The events description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The events description could not be saved. Please, try again.'));
        }
        $this->set(compact('eventsDescription'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Description id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsDescription = $this->EventsDescriptions->get($id);
        if ($this->EventsDescriptions->delete($eventsDescription)) {
            $this->Flash->success(__('The events description has been deleted.'));
        } else {
            $this->Flash->error(__('The events description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
