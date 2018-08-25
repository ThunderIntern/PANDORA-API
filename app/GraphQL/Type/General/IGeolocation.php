<?php

namespace App\GraphQL\Type\General;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class IGeolocation extends GraphQLType
{
	protected $attributes = [
		'name'				=> 'IGeolocation',
		'description'		=> 'array of geolocation'
	];

	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	protected $inputObject = true;

	public function fields()
	{
		return [
			'longitude'		=> 	[
									'name' 	=> 'panjang', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'latitude'		=> 	[
									'name' 	=> 'lebar', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			
		];
	}
}