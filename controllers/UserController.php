<?php

namespace app\controllers;

use app\controllers\BaseController;
use app\models\User;
use app\service\UrlService;

class UserController extends BaseController{

      //用户登录页面
      public function actionLogin(){
      	     return $this->render("login");
      }



	  //伪登录业务方法
	  public function actionVlogin(){
	  	     $uid=$this->get("uid",0);
	  	     if(!$uid){
	  	     	return $this->redirect(UrlService::buildUrl("/"));
	  	     }
	  	     $user_info=User::find()->where(['id'=>$uid])->one();
	  	     if(!$user_info){
	  	     	return $thhis->redirect(UrlService::buildUrl("/"));
	  	     }
	  	     //cookie保存用户的登录状态,cookie需加密，规则：user_auth_token + "#" + uid
	  	     $user_auth_token=md5($user_info['id'].$user_info['name'].$user_info['email'].$_SERVER['HTTP_USER_AGENT']);

	  	     $cookie_target=Yii::$app->response->cookies;
	  	     $cookie_target->add(new\yii\web\Cookie([
                       "name"  => "lzh",
                       "value" => $user_auth_token."#".$user_info['id']
	  	     	])); 
	  	     return $this->redirect(UrlService::buildUrl("/"));
	  }
}