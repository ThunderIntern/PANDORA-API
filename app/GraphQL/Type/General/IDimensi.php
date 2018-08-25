<?php

namespace App\GraphQL\Type\General;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class IDimensi extends GraphQLType
{
	protected $attributes = [
		'name'				=> 'IDimensi',
		'description'		=> 'array of dimensi'
	];

	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	protected $inputObject = true;

	public function fields()
	{
		return [
			'panjang'		=> 	[
									'name' 	=> 'panjang', 		
									'type' 	=> Type::string(),
									'rules' => ['required', 'string'],
								],
			'lebar'		=> 	[
									'name' 	=> 'lebar', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'tinggi'		=> 	[
									'name' 	=> 'tinggi', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
		
		];
	}
}