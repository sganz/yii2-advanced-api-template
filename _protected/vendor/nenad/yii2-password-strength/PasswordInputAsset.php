<?php
namespace nenad\passwordStrength;

/**
 * Asset bundle for PasswordInput Widget
 */
class PasswordInputAsset extends \nenad\AssetBundle
{
    public function init()
    {
        $this->setSourcePath('@vendor/nenad/yii2-strength-meter');
        $this->setupAssets('css', ['css/strength-meter']);
        $this->setupAssets('js', ['js/strength-meter']);
        parent::init();
    }
}