<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Simple Restful API controller
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class SampleController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';    
    
    
    /*
    *  allow override of the REST actions here -
    * 
    * 	index	: list of models
    * 	view 	: return the details of a model
    * 	create	: create a new model
    * 	update	: update an existing model
    *	delete	: delete an existing model
    *	options: return the allowed HTTP methods
    *
    * To remove support for any of these actions use unset($actions['action_name_here'], ...)
    */

	public function actions() 
	{
		$actions = parent::actions();

		// disable the "delete" and "create" actions
		unset($actions['delete'], $actions['create']);

		// customize the data provider preparation with the "prepareDataProvider()" method
		$actions['index']['prepareDataProvider'] = [$this, 'prepareIndexDataProvider'];
		$actions['view']['findModel'] = [$this, 'findSampleView'];	// different mechanism, no prepareDataProvider

		return $actions;
	}

/*
 * slower way, but more explicit, different options
 * 
  	public function actions()
	 {
		 return array_merge(parent::actions(), [
			 'create' => null, // Disable create
			 'view' => [
				 'class' => 'yii\rest\ViewAction',
				 'modelClass' => $this->modelClass,
				 'checkAccess' => [$this, 'checkAccess'],
				 'findModel' => ['\path\to\your\callback', 'findModelByYourOwnMethod'],
			 ],
			 'update' => [
				 'class' => 'path\to\your\UpdateAction',
				 'modelClass' => $this->modelClass,
				 'checkAccess' => [$this, 'checkAccess'],
				 'scenario' => SCENARIO_UPDATE,
			 ],
		 ]);
	 }
 */	 

	public function prepareIndexDataProvider()
	{
		return ['xxx'=>'yyy']; // prepare and return a data provider for the "index" action
	
	}

	public function findSampleView($id)
	{
		// $id has the parameter for the view
		return ['aaa'=>'bbb', 'the_id'=>$id]; // prepare and return a data provider for the "index" action
	}
    
}
