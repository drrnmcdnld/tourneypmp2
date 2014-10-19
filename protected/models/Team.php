<?php

/**
 * This is the model class for table "teams".
 *
 * The followings are the available columns in table 'teams':
 * @property integer $id
 * @property integer $tournament_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Tournaments $tournament
 * @property Games[] $games
 * @property Games[] $games1
 */
class Team extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tournament_id, name', 'required'),
			array('tournament_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tournament_id, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tournament' => array(self::BELONGS_TO, 'Tournament', 'tournament_id'),
			'homeGames' => array(self::HAS_MANY, 'Game', 'away_team_id'),
			'awayGames' => array(self::HAS_MANY, 'Game', 'home_team_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tournament_id' => 'Tournament',
			'name' => 'Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tournament_id',$this->tournament_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getWins() {
            $total = 0;
            $games = Game::model()->findAll('home_team_id=:tid', array(':tid'=>$this->id));
            foreach($games as $game) {
                if ($game->home_team_score > $game->away_team_score) {
                    $total++;
                }
            }
            
            $games = Game::model()->findAll('away_team_id=:tid', array(':tid'=>$this->id));
            foreach($games as $game) {
                if ($game->home_team_score < $game->away_team_score) {
                    $total++;
                }
            }
            
            return $total;
        }
        
        public function getLosses() {
            $total = 0;
            $games = Game::model()->findAll('home_team_id=:tid', array(':tid'=>$this->id));
            foreach($games as $game) {
                if ($game->home_team_score < $game->away_team_score) {
                    $total++;
                }
            }
            
            $games = Game::model()->findAll('away_team_id=:tid', array(':tid'=>$this->id));
            foreach($games as $game) {
                if ($game->home_team_score > $game->away_team_score) {
                    $total++;
                }
            }
            
            return $total;
        }
        
        public function getTies() {
            $total = 0;
            $games = Game::model()->findAll('home_team_id=:tid AND away_team_id=:tid', array(':tid'=>$this->id));
            foreach($games as $game) {
                if ($game->home_team_score == $game->away_team_score) {
                    $total++;
                }
            }
            
            return $total;
        }
}
