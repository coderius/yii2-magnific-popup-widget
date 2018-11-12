yii2-magnific-popup-widget
=========================
The yii2-magnific-popup-widget is a wrapper to script based on [Magnific Popup](https://github.com/dimsemenov/Magnific-Popup). 

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
php composer.phar require coderius/magnificPopup "@dev"
```

or add

```json
"coderius/magnificPopup" : "@dev"
```

to the require section of your application's `composer.json` file.

Usage.
-----------

**_In view file:_**

Html part
---------

```html
<!-- ///////////////////////-->
<!-- Which video popup-->
<a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-video">Video</a>

<!-- ///////////////////////-->
<!-- Which custom alert window-->           
<p>
    <a class="popup-with-zoom-anim" href="#small-dialog" >Open with fade-zoom animation</a><br/>
    <a class="popup-with-move-anim" href="#small-dialog" >Open with fade-slide animation</a>
</p>

<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
    <h1>Dialog example</h1>
    <p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.</p>
</div>

<!-- ///////////////////////-->
<!-- Which photo sets-->
<div class="popup-gallery">
    <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" title="The Cleaner"><img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" title="Winter Dance"><img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" title="The Uninvited Guest"><img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" title="Oh no, not again!"><img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_b.jpg" title="Swan Lake"><img src="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_b.jpg" title="The Shake"><img src="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_s.jpg" width="75" height="75"></a>
    <a href="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_b.jpg" title="Who's that, mommy?"><img src="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_s.jpg" width="75" height="75"></a>
</div>

```

Php part
--------
All elements are contained in array "elems" like single settings array.

```php
<?= coderius\magnificPopup\MagnificPopup::widget([
    'elems' => [
        [
            'target' => '.popup-video',
            'clientOptions' => [
                'type' => 'iframe'
            ],
        ], 

        [
            'target' => '.popup-gallery',
            'clientOptions' => [
                'delegate' => 'a',
                'type' => 'image',
                'tLoading' => 'Loading image #%curr%...',
                'mainClass' => 'mfp-img-mobile',
                'gallery' => [
                  'enabled' => true,
                  'navigateByImgClick' => true,
                  'preload' => [0,1] // Will preload 0 - before current, and 1 after the current image
                ],
                'image' => [
                  'tError' => '<a href="%url%">The image #%curr%</a> could not be loaded.',
                  'titleSrc' =>  new \yii\web\JsExpression("
                                    function(item) {
                                        return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                                    }
                                ")
                ]
            ],
        ], 

        [
            'target' => '.popup-with-zoom-anim',
            'clientOptions' => [
                'type' => 'inline',

                'fixedContentPos' =>  false,
                'fixedBgPos' =>  true,

                'overflowY' =>  'auto',

                'closeBtnInside' =>  true,
                'preloader' =>  false,

                'midClick' =>  true,
                'removalDelay' =>  300,
                'mainClass' =>  'my-mfp-zoom-in'
            ],
        ],

        [
            'target' => '.popup-with-move-anim',
            'clientOptions' => [
                'type' => 'inline',

                'fixedContentPos' => false,
                'fixedBgPos' => true,

                'overflowY' => 'auto',

                'closeBtnInside' => true,
                'preloader' => false,

                'midClick' => true,
                'removalDelay' => 300,
                'mainClass' => 'my-mfp-slide-bottom'
            ],
        ],
    ],


]);
?>
```
Styles
------

And styles to custom alert windows sets in any place view file:

```css
<?php 

$style = <<< STYLE

/* Styles for dialog window */
      #small-dialog {
        background: white;
        padding: 20px 30px;
        text-align: left;
        max-width: 400px;
        margin: 40px auto;
        position: relative;
      }

      /**
       * Fade-zoom animation for first dialog
       */
      
      /* start state */
      .my-mfp-zoom-in .zoom-anim-dialog {
        opacity: 0;

        -webkit-transition: all 0.2s ease-in-out; 
        -moz-transition: all 0.2s ease-in-out; 
        -o-transition: all 0.2s ease-in-out; 
        transition: all 0.2s ease-in-out; 



        -webkit-transform: scale(0.8); 
        -moz-transform: scale(0.8); 
        -ms-transform: scale(0.8); 
        -o-transform: scale(0.8); 
        transform: scale(0.8); 
      }

      /* animate in */
      .my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
        opacity: 1;

        -webkit-transform: scale(1); 
        -moz-transform: scale(1); 
        -ms-transform: scale(1); 
        -o-transform: scale(1); 
        transform: scale(1); 
      }

      /* animate out */
      .my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
        -webkit-transform: scale(0.8); 
        -moz-transform: scale(0.8); 
        -ms-transform: scale(0.8); 
        -o-transform: scale(0.8); 
        transform: scale(0.8); 

        opacity: 0;
      }

      /* Dark overlay, start state */
      .my-mfp-zoom-in.mfp-bg {
        opacity: 0;
        -webkit-transition: opacity 0.3s ease-out; 
        -moz-transition: opacity 0.3s ease-out; 
        -o-transition: opacity 0.3s ease-out; 
        transition: opacity 0.3s ease-out;
      }
      /* animate in */
      .my-mfp-zoom-in.mfp-ready.mfp-bg {
        opacity: 0.8;
      }
      /* animate out */
      .my-mfp-zoom-in.mfp-removing.mfp-bg {
        opacity: 0;
      }



      /**
       * Fade-move animation for second dialog
       */
      
      /* at start */
      .my-mfp-slide-bottom .zoom-anim-dialog {
        opacity: 0;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        -o-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;

        -webkit-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -moz-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -ms-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        -o-transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );
        transform: translateY(-20px) perspective( 600px ) rotateX( 10deg );

      }
      
      /* animate in */
      .my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
        opacity: 1;
        -webkit-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -moz-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -ms-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        -o-transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
        transform: translateY(0) perspective( 600px ) rotateX( 0 ); 
      }

      /* animate out */
      .my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
        opacity: 0;

        -webkit-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -moz-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -ms-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        -o-transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
        transform: translateY(-10px) perspective( 600px ) rotateX( 10deg ); 
      }

      /* Dark overlay, start state */
      .my-mfp-slide-bottom.mfp-bg {
        opacity: 0;

        -webkit-transition: opacity 0.3s ease-out; 
        -moz-transition: opacity 0.3s ease-out; 
        -o-transition: opacity 0.3s ease-out; 
        transition: opacity 0.3s ease-out;
      }
      /* animate in */
      .my-mfp-slide-bottom.mfp-ready.mfp-bg {
        opacity: 0.8;
      }
      /* animate out */
      .my-mfp-slide-bottom.mfp-removing.mfp-bg {
        opacity: 0;
      }        
        
STYLE;

Yii::$app->view->registerCss($style,['type' => "text/css"])

?>
``` 

More examples and docs in website [website](http://dimsemenov.com/plugins/magnific-popup/).

License
-------
**yii2-magnific-popup-widget** is released under the MIT License (MIT). See the bundled LICENSE.md for details.