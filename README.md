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

