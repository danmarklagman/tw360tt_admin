<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employee
 *
 * @author Dan Mark Lagman
 */

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Employee extends AppModel {
    
    public $validate = array(
        'UserName' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required'
            )
        ),
        'Password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['Password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['Password'] = $passwordHasher->hash(
                $this->data[$this->alias]['Password']
            );
        }
        return true;
    }
    
}
