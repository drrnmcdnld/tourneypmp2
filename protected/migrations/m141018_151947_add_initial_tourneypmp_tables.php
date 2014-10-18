<?php

class m141018_151947_add_initial_tourneypmp_tables extends CDbMigration
{
    public function up()
    {
        $this->createTable('users', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'last_login' => 'datetime DEFAULT NULL',
        ));
        
        $this->createTable('tournaments', array(
            'id' => 'pk',
            'user_id' => 'int(11) NOT NULL REFERENCES users(id)',
            'name' => 'string NOT NULL',
            'start_date' => 'date',
            'end_date' => 'date',
        ));
//        $this->addForeignKey('pk_tournaments_user', 'tournaments', 'user_id', 'users', 'id');
        
        $this->createTable('teams', array(
            'id' => 'pk',
            'tournament_id' => 'int(11) NOT NULL references tournaments(id)',
            'name' => 'string NOT NULL',
        ));
//        $this->addForeignKey('pk_teams_tournament', 'teams', 'tournament_id', 'tournaments', 'id');
        
        $this->createTable('fields', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'lat' => 'decimal(12,7) NOT NULL',
            'lng' => 'decimal(12,7) NOT NULL',
       ));
        
        $this->createTable('tournament_fields', array(
            'id' => 'pk',
            'tournament_id' => 'int(11) NOT NULL references tournaments(id)',
            'field_id' => 'int(11) NOT NULL references fields(id)',
        ));
/*        $this->addForeignKey('pk_tournament_fields_tournament', 'tournament_fields', 'tournament_id', 'tournaments', 'id');
        $this->addForeignKey('pk_tournament_fields_field', 'tournament_fields', 'field_id', 'fields', 'id');
*/
        $this->createTable('games', array(
            'id' => 'pk',
            'home_team_id' => 'int(11) NOT NULL references teams(id)',
            'away_team_id' => 'int(11) NOT NULL references teams(id)',
            'field_id' => 'int(11) NOT NULL references fields(id)',
            'home_team_score' => 'int(9) NOT NULL',
            'away_team_score' => 'int(9) NOT NULL',
            'game_played' => 'boolean DEFAULT false',
            'game_time' => 'datetime',
        ));
/*        $this->addForeignKey('pk_games_home_team', 'games', 'home_team_id', 'teams', 'id');
        $this->addForeignKey('pk_games_away_team', 'games', 'away_team_id', 'teams', 'id');
        $this->addForeignKey('pk_games_field', 'games', 'field_id', 'fields', 'id');*/
    }

    public function down()
    {
        /*$this->dropForeignKey('pk_games_field', 'games');
        $this->dropForeignKey('pk_games_away_team', 'games');
        $this->dropForeignKey('pk_games_home_team', 'games');
        $this->truncateTable('games');
        $this->dropTable('games');
        
        $this->dropForeignKey('pk_tournament_fields_field', 'tournament_fields');
        $this->dropForeignKey('pk_tournament_fields_tournament', 'tournament_fields');
        $this->truncateTable('tournament_fields');
        $this->dropTable('tournament_fields');
        
        $this->truncateTable('fields');
        $this->dropTable('fields');
        
        $this->dropForeignKey('pk_teams_tournament', 'teams');
        $this->truncateTable('teams');
        $this->dropTable('teams');
        
        $this->dropForeignKey('pk_tournaments_user', 'tournaments');*/
        $this->truncateTable('tournaments');
        $this->dropTable('tournaments');
        
        $this->truncateTable('users');
        $this->dropTable('users');
    }
}