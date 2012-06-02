<?php

class Create_Db {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// lookups
		Schema::create('lookups', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->string('name', 128);
			$t->integer('code');
			$t->string('type', 128);
			$t->integer('position');
		});
		// users
		Schema::create('users', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->string('username', 128);
			$t->string('password', 128);
			$t->string('email', 128);
			$t->text('profile');
		});
		// posts
		Schema::create('posts', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->string('title', 128);
			$t->text('content');
			$t->text('tags');
			$t->integer('status');
			$t->integer('author_id');
			$t->timestamps();
			
			$t->foreign('author_id')->references('id')->on('users');
		});
		// comments
		Schema::create('comments', function()
		{
			$t->create();
			$t->increments('id');
			$t->text('content');
			$t->integer('status');
			$t->string('author');
			$t->string('email');
			$t->string('url')->nullable();
			$t->integer('post_id');
			$t->timestamps();
			
			$t->foreign('post_id')->references('id')->on('posts');
		});
		// tags
		Schema::create('tags', function($t)
		{
			$t->create();
			$t->increments('id');
			$t->string('name', 128);
			$t->integer('frequency');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// delete tables
		Schema::drop('lookups');
		Schema::drop('users');
		Schema::drop('posts');
		Schema::drop('comments');
		Schema::drop('tags');
	}

}