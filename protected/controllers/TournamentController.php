<?php

class TournamentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('viewTournaments', 'viewStandings', 'viewScores'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('create','update','index','view'),
                        'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete'),
                        'users'=>array('admin'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
            );
	}
        
        public function actionViewTournament($id) {
            $tournament = Tournament::model()->find('id=:tid', array(':tid'=>$id));
            
            if ($tournament != null) {
                $this->render(array('viewTournament', 'tournament'=>$tournament));
            }
            else {
                $this->redirect('site/index');
            }
        }
        
        public function actionViewStandings($id) {
            $tournament = Tournament::model()->find('id=:tid', array(':tid'=>$id));
            
            if ($tournament != null) {
                $this->render('viewStandings', array('tournament'=>$tournament));
            }
            else {
                $this->redirect('site/index');
            }
        }
        
        public function actionViewScores($id) {
            $tournament = Tournament::model()->find('id=:tid', array(':tid'=>$id));
            
            if ($tournament != null) {
                $this->render('viewScores', array('tournament'=>$tournament));
            }
            else {
                $this->redirect('site/index');
            }
        }
        
        public function actionViewTournaments() {
            $tournaments = Tournament::model()->findAll('1 order by name');
            
            $this->render('viewTournaments', array('tournaments'=>$tournaments));
        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $tournament = Tournament::model()->find('id=:tid AND user_id=:uid', array(':tid'=>$id, ':uid'=>Yii::app()->user->uid));
            
            $this->render('view',array(
                'tournament'=>$tournament,
            ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$tournament=new Tournament;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($tournament);

		if(isset($_POST['Tournament']))
		{
			$tournament->attributes=$_POST['Tournament'];
                        $tournament->user_id = Yii::app()->user->uid;
			if($tournament->save())
				$this->redirect(array('view','id'=>$tournament->id));
		}

		$this->render('create',array(
			'tournament'=>$tournament,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$tournament=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tournament']))
		{
                    $tournament->attributes=$_POST['Tournament'];
                    if($tournament->save())
                        $this->redirect(array('view','id'=>$tournament->id));
		}

		$this->render('update',array(
                    'tournament'=>$tournament,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            /*ini_set('display_startup_errors',1);
            ini_set('display_errors',1);
            error_reporting(-1);*/
            $tournaments = Tournament::model()->findAll("user_id=:uid", array(":uid"=>Yii::app()->user->uid));
           
		$this->render('index',array(
                    'tournaments'=>$tournaments,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tournament('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tournament']))
			$model->attributes=$_GET['Tournament'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tournament the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tournament::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tournament $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tournament-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
