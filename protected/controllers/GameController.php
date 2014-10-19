<?php

class GameController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','enterScore'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($tid)
	{
            $tournament = Tournament::model()->find('id=:tid AND user_id=:uid', array(':tid'=>$tid, ':uid'=>Yii::app()->user->uid));
            $game=new Game;
            $fields = Field::model()->findAll();

            if(isset($_POST['Game']))
            {
                    $game->attributes=$_POST['Game'];
                    $game->tournament_id=$tid;
                    if ($game->home_team_id == $game->away_team_id) {
                        $game->addError('away_team_id', 'Home Team cannot be the same as the Away Team.');
                    }
                    else {
                        $game->home_team_score = 0;
                        $game->away_team_score = 0;
                        $game->game_played = 0;
                        if($game->save()) {
                            $this->redirect(array('Tournament/view','id'=>$tid));
                        }
                    }
            }

            $this->render('create',array(
                'game'=>$game,
                'tournament' => $tournament,
                'fields'=>$fields,
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the game to be updated
	 */
	public function actionUpdate($id)
	{
		$game=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($game);

		if(isset($_POST['Game']))
		{
			$game->attributes=$_POST['Game'];
			if($game->save())
				$this->redirect(array('view','id'=>$game->id));
		}

		$this->render('update',array(
			'game'=>$game,
		));
	}
        
        public function actionEnterScore($id, $tid)
	{
            $game=$this->loadModel($id);

            if(isset($_POST['Game']))
            {
                $game->game_played = 1;
                $game->home_team_score = $_POST['Game']['home_team_score'];
                $game->away_team_score = $_POST['Game']['away_team_score'];
                
                if ($game->save()) {
                    $this->redirect(array('Tournament/view', 'id'=>$tid));
                }
                else {
                    $game->addError('id', 'Could not enter score.  Please contact support');
                }
            }

            $this->render('enterScore',array(
                'game'=>$game,
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
		$dataProvider=new CActiveDataProvider('Game');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Game('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Game']))
			$model->attributes=$_GET['Game'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Game the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Game::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Game $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='game-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
