<?php

/**
 * @package yii2-extentions
 * @license BSD-3-Clause
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */
namespace coderius\magnificPopup;

use Yii;
use yii\base\Component;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Closure;
use yii\base\InvalidConfigException;

class Element extends Component
{
    /**
     * Jquery selector to which element should apply the magnific-popup.
     * @var string jQuery Selector
     */
    public $target;
    
    /**
     * @var type of element
     */
    public $defaultOptions = array(
        'type' => 'image'
    );
    
    /**
     * @var array the options for the Magnific Popup JS plugin.
     * @see http://dimsemenov.com/plugins/magnific-popup/documentation.html
     */
    public $clientOptions = [];
    
    /**
     * Options in the documentation for magnific-popup
     * @see http://dimsemenov.com/plugins/magnific-popup/documentation.html
     * @var array Magnific-Popup Option
     */
    public $options = array();
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        if ($this->target === null) {
            throw new InvalidConfigException('"MagnificPopup::$targets" must be set');
        }
        
        $this->options = ArrayHelper::merge($this->defaultOptions, $this->clientOptions);
        //
    } 
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
    }
    
    /**
     * Registers Magnific Popup JS plugin
     */
    protected function registerClientScript()
    {
        $view = Yii::$app->getView();
        $js = "jQuery('{$this->target}').magnificPopup(" . Json::encode($this->options) . ");";
        $view->registerJs($js);
        
    }
    
    
    
}
