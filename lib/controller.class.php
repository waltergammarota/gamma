<?php
class Controller {
     
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;
 
    function __construct($model, $controller, $action) {
         
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_model = $model;
        $this->_ajax = false;
 
        $this->$model = new $model;
        $this->_template = new Template($controller,$action);
 
    }
 
    // This method active the flag to return the response without header and footer.
    function ajax()
    {
        $this->_ajax = true;
    }

    function view($id = null,$name = null) {
        $this->set('title',$name.' - GAMMA MVC');
        $this->set('data',$this->{$this->_model}->select($id));
    }

    function index() {
        $this->set('title','All Items - GAMMA MVC');
        $this->set('data',$this->{$this->_model}->selectAll());
    }

    // Manual Insert, not used at th
    function add() {
        $data = $_POST['data'];
        $this->set('title','Success - GAMMA MVC');
        $this->set('data',$this->{$this->_model}->query('insert into '.$this->{$this->_model}->_table.' (item_name) values (\''.$this->{$this->_model}->escape_string($data).'\')'));   
    }
     
    function delete($id = null) {
        $this->set('title','Success - GAMMA MVC');
        $this->set('data',$this->{$this->_model}->query('delete from '.$this->{$this->_model}->_table.' where id = \''.$this->{$this->_model}->escape_string($id).'\''));   
    }    


    function set($name,$value) {
        $this->_template->set($name,$value);
    }
 
    function __destruct() {
        $this->_template->render($this->_ajax);
    }
         
}
