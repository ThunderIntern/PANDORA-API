<?php

namespace App\GraphQL\Type\General;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class IAlamat extends GraphQLType
{
	protected $attributes = [
		'name'				=> 'IAlamat',
		'description'		=> 'array of alamat'
	];

	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	protected $inputObject = true;

	public function fields()
	{
		return [
			'jalan'		=> 	[
									'name' 	=> 'jalan', 		
									'type' 	=> Type::string(),
									'rules' => ['required', 'string'],
								],
			'kelurahan'		=> 	[
									'name' 	=> 'kelurahan', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'kecamatan'		=> 	[
									'name' 	=> 'kecamatan', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'kota'	    	=> 	[
									'name' 	=> 'kota', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'kodepos'		=> 	[
									'name' 	=> 'kodepos', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
			'no_telp'		=> 	[
									'name' 	=> 'no_telp', 		
									'type' 	=> Type::string(),
									'rules' => ['nullable', 'string'],
								],
											
		];
	}
}