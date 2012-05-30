<?php

class Section extends Laravel\Section {
	
	/**
	 * Check whether a section exists
	 * 
	 * @param string $section
	 * @return bool
	 */
	public static function exists($section)
	{
		return isset(static::$sections[$section]);
	}
}