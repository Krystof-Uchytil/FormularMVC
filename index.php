<?php
require 'classes/Model.php';
require 'classes/Controller.php';
require 'classes/FormModel.php';
require 'classes/FormController.php';
require 'classes/Router.php';

Router::route($_SERVER['REQUEST_URI']);