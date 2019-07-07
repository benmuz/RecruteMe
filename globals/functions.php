<?php
//gestion actif de menu de la navigation
    if(!function_exists('set_active')){
        function set_active($file,$class="active"){
            $page=array_pop(explode('/',$_SERVER['SCRIPT_NAME']));
            if($page == $file.'.php'){
              echo $class; //normalement c return et non echo
            }
            else{
               echo '';
            }
        }
    }

