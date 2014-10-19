<?php

class m141019_013338_add_tournament_games extends CDbMigration
{
	public function up()
	{
            $this->addColumn('games', 'tournament_id', 'int(11) NOT NULL DEFAULT null REFERENCES tournaments(id)');
	}

	public function down()
	{
            $this->dropColumn('games', 'tournament_id');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}