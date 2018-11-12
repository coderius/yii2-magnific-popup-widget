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
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Closure;
use yii\base\InvalidConfigException;

class MagnificPopup extends Widget
{
    public $elems = [];
    
    private $_elementClass = 'coderius\magnificPopup\Element';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        if (empty($this->elems) || $this->elems === null) {
            throw new InvalidConfigException('"MagnificPopup::$elems" must be set');
        }
        
    } 
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        MagnificPopupAsset::register($view);
        
        foreach($this->elems as $index => $config){
            $config['class'] = $this->_elementClass;
            $elemen = Yii::createObject($config);
            $result = $elemen->run();
        }
    }
    
    
    
    
}