<?php 
 /**
  * 
  */
 class Controller{
 	public function loadView($viewName){
 		require 'view/'.$viewName.".php";
 	}

 	public function loadDAO($DAOName){
 		require 'modelo/DAO/'.$DAOName.".php";
 	}

 	public function loadModel($modelName){
 		require 'modelo/'.$modelName.".php";
 	}
 }