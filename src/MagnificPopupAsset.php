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
use yii\web\AssetBundle;
/**
 * Asset bundle jQCloudAsset
 */
class MagnificPopupAsset extends AssetBundle
{
    public $sourcePath = '@bower/magnific-popup/dist';
    
    public $css = [];
    
    public $js = [];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->js[] = YII_DEBUG ? 'jquery.magnific-popup.min.js' : 'jquery.magnific-popup.js';
        $this->css[] = 'magnific-popup.css';
    }
    
}

