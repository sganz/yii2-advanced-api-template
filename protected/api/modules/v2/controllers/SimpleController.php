<?php

namespace api\modules\v2\controllers;

use Yii;
use yii\web\Controller;

/**
 * Simple controller, all response are JSON type
 */
 
class SimpleController extends Controller
{
	// if you are doing non-verified stuff must have this set to false
	// so yii doesn't look for the token.
	
	public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();

        Yii::$app->user->enableSession = false;	// no sessions for this controller
        Yii::$app->user->loginUrl = null;		// no default login needed
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;	// default this controller to JSON
    }

	public function actionHello()
	{
		return 'Hello - V2 API';
	}

	public function actionHellox()
	{
		return 'Hellox - V2 API';
	}

	// adds a new recipe and all that it entails
	public function actionId()
	{
		/*
		* see if an ajax request (XMLHttpRequest), if we want to allow
		* a regular (non-ajax) request you could do something here
		* based on that info. For the most part we only want ajax
		*/
		
		if (!Yii::$app->request->isAjax)
			throw new \yii\web\MethodNotAllowedHttpException;
		
		// do some checking
			
		if(!isset($_POST['id']))
			throw new \yii\web\BadRequestHttpException;

		return ['jkl' => 'mnop  - V2 API', 'id'=>$_POST['id']];
	}
}
