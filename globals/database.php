<?php

if(!defined('BD_SERVEUR')) define('BD_SERVEUR', 'localhost');
if(!defined('BD_UTILISATEUR')) define('BD_UTILISATEUR', 'root');
if(!defined('BD_PASSWORD')) define('BD_PASSWORD', '');
if(!defined('BD_NOM')) define('BD_NOM', 'bd_congojob');
if(!defined('BD_DSN')) define('BD_DSN', 'mysql:host='.BD_SERVEUR.';dbname='.BD_NOM);