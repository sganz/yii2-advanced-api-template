<?php
namespace api\modules\v1;

/*
* Simple Module wrapper. Not much going on except setting the
* controllers namespace. NOTE make sure you have the version
* correct here if you copy this file and update it to the new
* version.
*/

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'api\modules\v1\controllers';
    
    public function init()
    {
        parent::init();
    }
}
