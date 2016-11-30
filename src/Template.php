<?php
    /* this is a small templating engine */
    class Template{
        protected $templateDir = "views/"; /*set the directory path for templates*/
        protected $vars = array(); /*we will store the parameters passed to the template in this array */

        public function __construct(){

        }
        public function render($templateFile){
            if(file_exists($this->templateDir.$templateFile)){
                include $this->templateDir.$templateFile;
            }
        }
        public function __set($name,$value){ //create dynamic properties
            $this->vars[$name] = $value;
        }
        public function __get($name){ //retrive dynamic properties
            return $this->vars[$name];
        }

    }
?>
