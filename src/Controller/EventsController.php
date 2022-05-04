<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\Event;
use Cake\I18n\FrozenTime;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['EventsTypes', 'EventsDescriptions', 'Organisations'],
        ];
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return  \App\Model\Entity\Event list of events
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->getEvents($id)->all();
        if ($event->count() == 1){
            $this->set(compact('event'));
        }
        else{
            $events = $event;
            $this->set(compact('events'));
        }
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return  \App\Model\Entity\Event list of events
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getEvents($id = null)
    {
        if ($id){
            if (!AppController::$CURRENT_USER){
                $event = $this->Events->findById($id)
                    ->contain(['EventsTypes', 'EventsDescriptions', 'Organisations', 'EventsLots', 'EventsRights'])
                    ->where(['Events.is_private' => 0]);
            }
            else{
                $event = $this->Events->findById($id)
                    ->contain(['EventsTypes', 'EventsDescriptions', 'Organisations', 'EventsLots', 'EventsRights']);
                if (!$event->first()){
                    return $event;
                }
                if ($event->first()->is_private){
                    $event->where(['Events.id_organisation' => AppController::$CURRENT_USER->organisation->id]);
                }
            }
        }
        else{
            $event = $this->Events->find('all')
                ->contain(['EventsTypes', 'EventsDescriptions', 'Organisations', 'EventsLots', 'EventsRights'])
                ->where(['Events.is_private' => 0,'DATE(Events.end_date) >=' => date("Y-m-d H:i:m", time())])
                ->order(['Events.start_date','EventsTypes.is_legal'],'DESC')
                ->limit(15);
        }


        return $event;
    }

    public function getEventsTypes()
    {
        $eventsType = $this->EventsTypes->find('all');

        return $eventsType;
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEmptyEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $eventsTypes = $this->Events->EventsTypes->find('list', ['limit' => 200])->all();
        $eventsDescriptions = $this->Events->EventsDescriptions->find('list', ['limit' => 200])->all();
        $organisations = $this->Events->Organisations->find('list', ['limit' => 200])->all();
        $this->set(compact('event', 'eventsTypes', 'eventsDescriptions', 'organisations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->getData());
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The event could not be saved. Please, try again.'));
        }
        $eventsTypes = $this->Events->EventsTypes->find('list', ['limit' => 200])->all();
        $eventsDescriptions = $this->Events->EventsDescriptions->find('list', ['limit' => 200])->all();
        $organisations = $this->Events->Organisations->find('list', ['limit' => 200])->all();
        $this->set(compact('event', 'eventsTypes', 'eventsDescriptions', 'organisations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
