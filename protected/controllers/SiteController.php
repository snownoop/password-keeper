<?php

class SiteController extends Controller
{
    public function beforeAction($action)
    {
        Yii::app()->bootstrap->register();
        return parent::beforeAction($action);
    }

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionIndex()
    {
        if(Yii::app()->user->isGuest)
        {
            $this->redirect('site/about');
        }
        else
        {
            $this->redirect('site/dashboard');
        }
    }

    public function actionSignUp()
    {
        $model = new Users();

        if (isset($_POST['Users']))
        {
            $model->attributes = $_POST['Users'];
            if ($model->save())
            {
                $this->redirect('signIn');
            }
        }
        else
        {
            $this->render('signUp', array('model' => $model));
        }
    }

    public function actionSignIn()
    {
        if (!empty(Yii::app()->user->name) && Yii::app()->user->name != 'Guest')
        {
            $this->redirect(array('site/index')); //TODO another link
        }
        else
        {
            $model = new LoginForm;

            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm']))
            {
                $model->attributes = $_POST['LoginForm'];

                if ($model->validate() && $model->login())
                    $this->redirect(array('site/dashboard'));
            }
            // display the login form
            $this->render('signIn', array('model' => $model));
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionDashboard()
    {
        if (Yii::app()->user->id)
        {
            $model=new Data('search');

            $this->render('dashboard', array('model' => $model));
        }
        else
        {
            $this->render('404');
        }
    }

    public function actionPreferences()
    {
        if (Yii::app()->user->id)
        {
            $this->render('preferences');
        }
        else
        {
            $this->render('404');
        }
    }

    public function actionEdit()
    {

    }

    public function actionDelete()
    {

    }

    public function actionView()
    {
        $recordId = Yii::app()->request->getQuery('id');

        $model = Data::model()->findByPk($recordId);
        $this->render('view', array('model' => $model));
    }

    public function actionTesting()
    {
        $model = Data::model()->findByPk(4);
        echo strlen(preg_replace('/[^A-Z]+/', '', $model->password));
        echo preg_match_all('/[a-z]/', $model->password, $matches);

        echo $model->password;

        echo "<pre>";
        print_r($matches);
        echo "</pre>";
    }
}