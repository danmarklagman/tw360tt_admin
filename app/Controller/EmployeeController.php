<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeController
 *
 * @author Dan Mark Lagman
 */

App::uses('AppController', 'Controller');

class EmployeeController extends AppController {
    
    public $uses = array('Employee', 'Position', 'Department', 'Office');
    
    public function index() {
        
        $employees = $this->Employee->find('all', array(
            'joins' => array (
                array(
                    'table' => 'positions',
                    'alias' => 'Position',
                    'type' => 'INNER',
                    'foreignKey' => false,
                    'conditions' => array(
                        'Employee.PositionId = Position.Id'
                    )
                )
            ),
            'fields' => array(
                'Employee.Id',
                'Employee.EmployeeNumber',
                'Employee.UserName',
                'Position.Name',
                'Employee.FirstName',
                'Employee.MiddleName',
                'Employee.LastName',
                'Employee.IsActive'
            ),
            'conditions' => array(
                'Employee.IsActive' => 1
            )
        ));
        
        $this->set(array(
            'employees' => $employees
        ));
        
    }
    
    public function add() {
        
        $positions = $this->Position->find('all', array(
            'fields' => array(
                'Position.Id',
                'Position.Name'
            ),
            'conditions' => array(
                'Position.IsActive' => 1
            )
        ));
        
        $departments = $this->Department->find('all', array(
            'fields' => array(
                'Department.Id',
                'Department.Name'
            ),
            'conditions' => array(
                'Department.IsActive' => 1
            )
        ));
        
        $offices = $this->Office->find('all', array(
            'fields' => array(
                'Office.Id',
                'Office.Name'
            ),
            'conditions' => array(
                'Office.IsActive' => 1
            )
        ));
        
        $this->set(array(
            'positions' => $positions,
            'departments' => $departments,
            'offices' => $offices
        ));
        
    }
    
    public function doAdd() {
        
        $this->autoRender = false;
        
        $checkEmpNumber = $this->Employee->find('all', array(
            'conditions' => array(
                'Employee.EmployeeNumber' => $this->request->data['Employee']['EmployeeNumber']
            )
        ));
        
        $checkUsername = $this->Employee->find('all', array(
            'conditions' => array(
                'Employee.UserName' => $this->request->data['Employee']['UserName']
            )
        ));
        
        if ($this->request->is('post')) {
            if($checkEmpNumber) {
                return json_encode(array(
                    'message' => 'Employee Number already exists. Please try another one.', 
                    'alert' => 'warning',
                    'icon' => 'exclamation-sign'
                ));
            }
            
            if($checkUsername) {
                return json_encode(array(
                    'message' => 'User Name already exists. Please try another one.', 
                    'alert' => 'warning',
                    'icon' => 'exclamation-sign'
                ));
            }
            
            $this->Employee->create();
            if ($this->Employee->save($this->request->data)) {
                $this->Employee->saveField('Password', 'changme123'.date('Y-m-d H:i:s'));
                $this->Employee->saveField('DateCreated', date('Y-m-d H:i:s'));
                return json_encode(array(
                    'message' => 'Employee added successfully.', 
                    'alert' => 'success', 
                    'icon' => 'ok',
                    'redirect' => $this->base_url.Router::url(array('controller' => 'employee', 'action' => 'index'))
                ));
            } else {
                return json_encode(array(
                    'message' => 'Unable to save data. Try again.', 
                    'alert' => 'warning',
                    'icon' => 'exclamation-sign'
                ));
            }
        }
        
    }
    
    public function edit($id) {
        
        if(!$id) {
            throw new NotFoundException(__('Invalid Employee'));
        }
        
        $employee = $this->Employee->findById($id);
        
        $positions = $this->Position->find('all', array(
            'conditions' => array(
                'Position.IsActive' => 1
            )
        ));
        
        
        if(!$employee) {
            throw new NotFoundException(__('Invalid Employee'));
        }
        
        if(!$this->request->data) {
            $this->request->data = $employee;
        }
        
        $this->set(array(
            'positions' => $positions,
            'employee' => $employee
        ));
        
    }
    
    public function doEdit() {
        
        $this->autoRender = false;
        
    }
    
}
