<?php

/**
 * This is the model class for table "games".
 *
 * The followings are the available columns in table 'games':
 * @property integer $id
 * @property integer $home_team_id
 * @property integer $away_team_id
 * @property integer $field_id
 * @property integer $home_team_score
 * @property integer $away_team_score
 * @property integer $game_played
 * @property string $game_time
 *
 * The followings are the available model relations:
 * @property Fields $field
 * @property Teams $awayTeam
 * @property Teams $homeTeam
 */
class Game extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'games';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('home_team_id, away_team_id, field_id, home_team_score, away_team_score', 'required'),
			array('home_team_id, away_team_id, field_id, home_team_score, away_team_score, game_played', 'numerical', 'integerOnly'=>true),
			array('game_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, home_team_id, away_team_id, field_id, home_team_score, away_team_score, game_played, game_time', 'safe', 'on'=>'search'),
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
			'field' => array(self::BELONGS_TO, 'Field', 'field_id'),
			'awayTeam' => array(self::BELONGS_TO, 'Team', 'away_team_id'),
			'homeTeam' => array(self::BELONGS_TO, 'Team', 'home_team_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'home_team_id' => 'Home Team',
			'away_team_id' => 'Away Team',
			'field_id' => 'Field',
			'home_team_score' => 'Home Team Score',
			'away_team_score' => 'Away Team Score',
			'game_played' => 'Game Played',
			'game_time' => 'Game Time',
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
		$criteria->compare('home_team_id',$this->home_team_id);
		$criteria->compare('away_team_id',$this->away_team_id);
		$criteria->compare('field_id',$this->field_id);
		$criteria->compare('home_team_score',$this->home_team_score);
		$criteria->compare('away_team_score',$this->away_team_score);
		$criteria->compare('game_played',$this->game_played);
		$criteria->compare('game_time',$this->game_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Game the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
