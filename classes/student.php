<?php

class student extends objectModel 
{
	public $id_student;
	public $structure = array(
		'id' => 'id_student',
		'fields' => array(
				'id_student',
				'birth',
				'first_name',
				'last_name',
				'education',
				'active'
			)
		);

	public $birth;
	public $first_name;
	public $last_name;
	public $education;
	public $active;
}
?>