<?php

class Comment extends Eloquent {
	
	const PENDING = 0;
	const APPROVED = 1;
	
	public static $status = array(
		0 => 'Pending',
		1 => 'Approved',
	);
	
}