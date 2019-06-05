<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use app\models\Lessons;
use app\models\Post;

class SiteController extends Controller
{
   public function actionIndex()
   {
       return $this->render('index');  
   }

   public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

   public function actionSignup()
    {
        $model = new Signup();
        
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');
            if($model->validate() && $model->signup())
            {
                return $this->redirect(['/site/login']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionLogin(){
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['/news/index']);
        }

        $login_model = new Login();

        if(Yii::$app->request->post('Login')){
            $login_model->attributes = Yii::$app->request->post('Login');

            if($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login',['login_model'=>$login_model]);
    }

    public function actionProfile(){
        return $this->render('profile');
    }
    
    public function actionLiked(){
       $query = Post::find()
       ->innerJoin('post_likes', 'post_likes.post_id = post.post_id')->orderBy('post_likes.like_id DESC')->all();
        return $this->render('liked',[
            'posts' => $query
        ]);
    }
}
