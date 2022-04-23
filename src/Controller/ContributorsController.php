<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contributors Controller
 *
 * @property \App\Model\Table\ContributorsTable $Contributors
 * @method \App\Model\Entity\Contributor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContributorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contributors = $this->paginate($this->Contributors);

        $this->set(compact('contributors'));
    }

    /**
     * View method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contributor = $this->Contributors->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contributor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contributor = $this->Contributors->newEmptyEntity();
        if ($this->request->is('post')) {
            $contributor = $this->Contributors->patchEntity($contributor, $this->request->getData());
            if ($this->Contributors->save($contributor)) {
                $this->Flash->success(__('The contributor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contributor could not be saved. Please, try again.'));
        }
        $this->set(compact('contributor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contributor = $this->Contributors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contributor = $this->Contributors->patchEntity($contributor, $this->request->getData());
            if ($this->Contributors->save($contributor)) {
                $this->Flash->success(__('The contributor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contributor could not be saved. Please, try again.'));
        }
        $this->set(compact('contributor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contributor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contributor = $this->Contributors->get($id);
        if ($this->Contributors->delete($contributor)) {
            $this->Flash->success(__('The contributor has been deleted.'));
        } else {
            $this->Flash->error(__('The contributor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
