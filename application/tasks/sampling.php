<?php

class Sampling_Task {
	
	public function initial($args) 
	{
		// sample data
		$user = User::create(array('username'=>'demo', 'password'=>Hash::make('demo'), 'email'=>'demo@demo.dev', 'profile'=>'Dummy user'));
		
		Post::create(array('title'=>'Hello', 'content'=>'World!', 'tags'=>'', 'status'=>0, 'author_id'=>$user->id));
	}
}