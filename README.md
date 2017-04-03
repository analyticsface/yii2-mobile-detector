Aface Mobile Detect
===================


Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/). This requires the 
composer-asset-plugin, which is also a dependency for yii2 – so if you have yii2 installed, you are most likely already 
set.


Either run

```
composer require analyticsface/yii2-mobile-detector:*
```
or add

```json
"analyticsface/yii2-mobile-detector" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

add rule for hide 'index' action
```
'<controller:\w+>/' => '<controller>/index'
```


1) Add to /frontend/config/bootstrap.php

```
Yii::$container->set('aface\mobiledetector\mode\ClientMode', function () {
    return new \aface\mobiledetector\mode\ClientMode(Yii::$app->request);
});
```

2) Add to 'components' view

```
'components' => [
        'view' => function (\aface\mobiledetector\mode\ViewMode $mode) {
            return Yii::createObject([
                'class' => 'yii\web\View',
                'theme' => $mode->isMobile()
                    ? [
                        'basePath' => '@frontend/themes/mobile',
                        'baseUrl' => '@web',
                        'pathMap' => [
                            '@frontend/views' => '@frontend/themes/mobile/views',
                        ],
                    ]
                    : [
                        'basePath' => '@frontend/themes/desktop',
                        'baseUrl' => '@web',
                        'pathMap' => [
                            '@frontend/views' => '@frontend/themes/desktop/views',
                        ],
                    ],
            ]);
        },
        ...
    ]
```

3) Add filter 'as viewMode'

```
 'components' => [
        ...
    ],
    'as viewMode' => [
        'class' => 'aface\mobiledetector\filter\ViewModeFilter',
        'expire' => 30 * 86400 // 30 days
    ],
    'params' => $params,
```

4) Add to layout switch link 

```
<?= Html::a('Mobile version', Url::current(['mode' => 'mobile']), ['data-method' => 'post']) ?>
```

5) If css/js files used from theme

a) add to main Asset
```
public $sourcePath = '@theme';
```
b) add bootstrap and aliases
```
'bootstrap' => [
    'log',
    [
       'class' => 'aface\mobiledetector\bootstrap\Bootstrap',
       'themesPath' => '@frontend/themes/'
    ],
    ...
],
...
'aliases' => [
    '@theme' => '@frontend/themes/desktop', // path to Theme default
],
```