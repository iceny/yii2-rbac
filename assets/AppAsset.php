<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use app\service\UrlService;
/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $css = [
    //     '/bootstrap/css/bootstrap.min.css'
    // ];
    // public $js = [
    //      '/bootstrap/js/bootstrap.min.js',
    //     '/jquery/jquery-3.2.0.min.js'
    // ];
    

    //重写此方法可以解决js、css文件增加版本号为变量的问题
    public function registerAssetFiles($view){
        $release="20170409";    //版本
        $this->css=[
                  UrlService::buildUrl("/bootstrap/css/bootstrap.min.css",['v'=>$release]),
                  UrlService::buildUrl('/css/app.css')
        ];
        $this->js=[
                   UrlService::buildUrl('/bootstrap/js/bootstrap.min.js'),
                   UrlService::buildUrl('/jquery/jquery-3.2.0.min.js')
        ];

        parent::registerAssetFiles($view);
    }
}
