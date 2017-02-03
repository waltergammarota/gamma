<?php
class Template {

	protected $variables = array();
	protected $_controller;
	protected $_action;

	function __construct($controller,$action) {

		$this->_controller = $controller;
		$this->_action = $action;
	}

	// Set Variables
	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	// Render template and extract variables to use them
    function render($ajax = false) {
		extract($this->variables);

		// If the flag 'ajax' is on, we skip the header
		if(!$ajax)
		{
			if (file_exists(ROOT .'/app/views/' . $this->_controller . '/header.php')) {
				include (ROOT . '/app/views/' . $this->_controller . '/header.php');
			} else {
				include (ROOT . '/app/views/header.php');
			}
		}

			if(file_exists(ROOT . '/app/views/' . $this->_controller . '/' . $this->_action . '.php'))
	        	include (ROOT . '/app/views/' . $this->_controller . '/' . $this->_action . '.php');		 
	        elseif(file_exists(ROOT . '/app/views/' . $this->_action . '.php'))
	        	include (ROOT . '/app/views/' . $this->_action . '.php');		 
	        else
	        	echo ("View <b>". $this->_action ."</b> of model <b>". $this->_controller ."</b> not found");

        // If the flag 'ajax' is on, we skip the footer
		if(!$ajax)
		{
			if (file_exists(ROOT . '/app/views/' . $this->_controller . '/footer.php')) {
				include (ROOT . '/app/views/' . $this->_controller . '/footer.php');
			} else {
				include (ROOT . '/app/views/footer.php');
			}
		}
    }

}
