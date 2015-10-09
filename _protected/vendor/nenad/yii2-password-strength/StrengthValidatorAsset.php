<?php
namespace nenad\passwordStrength;

/**
 * Asset bundle for StrengthValidator
 */
class StrengthValidatorAsset extends \nenad\AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('js', ['js/strength-validation']);
        parent::init();
    }
}