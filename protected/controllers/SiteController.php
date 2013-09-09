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

    public function loadDataModel($id)
    {
        $model = Data::model()->findByPk((int)$id);
        if ($model === null)
            throw new CHttpException(404, 'Запрошенная страница не существует.');
        return $model;
    }

    public function actionIndex()
    {
        if (Yii::app()->user->isGuest)
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
            else
            {
                $this->redirect('signUp');
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
            $model = new Data('search');

            $this->render('dashboard', array('model' => $model));
        }
        else
        {
            $this->render('404');
        }
    }

    public function actionUpdate()
    {
        $recordId = Yii::app()->request->getQuery('id');

        $model = $this->loadDataModel($recordId);

        $model->password = $this->decodePassword($model->password, $model->salt);

        if (isset($_POST['Data']))
        {
            $model->attributes = $_POST['Data'];
            if ($model->save())
            {
                Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully edit a record.');
                $this->redirect(array('site/dashboard'));
            }
        }

        $this->render('update', array('model' => $model));
    }

    public function actionDelete()
    {
        $recordId = Yii::app()->request->getQuery('id');

        $model = $this->loadDataModel($recordId);
        $model->delete();
    }

    public function actionView()
    {
        $recordId = Yii::app()->request->getQuery('id');

        $model = $this->loadDataModel($recordId);
        $model->password = $this->decodePassword($model->password, $model->salt);
        $this->render('view', array('model' => $model));
    }

    public function actionAdd()
    {
        $model = new Data();

        if (isset($_POST['Data']))
        {
            $model->attributes = $_POST['Data'];
            $model->id_user = Yii::app()->user->id;
            if ($model->save())
            {
                Yii::app()->user->setFlash('success', '<strong>Well done!</strong> You successfully edit a record.');
                $this->redirect(array('site/dashboard'));
            }
        }

        $this->render("add", array('model' => $model));
    }

    private function decodePassword($password, $salt)
    {
        $password = base64_decode($password);
        return str_replace($salt, "", $password);
    }
}