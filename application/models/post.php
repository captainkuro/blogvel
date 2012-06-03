<?php

class Post extends Eloquent {
	
	const DRAFT = 0;
	const PUBLISHED = 1;
	const ARCHIVED = 2;
	
	public static $status = array(
		0 => 'Draft',
		1 => 'Published',
		2 => 'Archived',
	);
	
}