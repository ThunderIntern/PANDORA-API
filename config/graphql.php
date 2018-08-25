<?php


return [

    /*
     * The prefix for routes
     */
    'prefix' => 'graphql',

    /*
     * The domain for routes
     */
    'domain' => null,

    /*
     * The routes to make GraphQL request. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Route
     *
     * Example:
     *
     * Same route for both query and mutation
     *
     * 'routes' => [
     *     'query' => 'query/{graphql_schema?}',
     *     'mutation' => 'mutation/{graphql_schema?}',
     *      mutation' => 'graphiql'
     * ]
     *
     * you can also disable routes by setting routes to null
     *
     * 'routes' => null,
     */
    'routes' => '{graphql_schema?}',

    /*
     * The controller to use in GraphQL requests. Either a string that will apply
     * to both query and mutation or an array containing the key 'query' and/or
     * 'mutation' with the according Controller and method
     *
     * Example:
     *
     * 'controllers' => [
     *     'query' => '\Folklore\GraphQL\GraphQLController@query',
     *     'mutation' => '\Folklore\GraphQL\GraphQLController@mutation'
     * ]
     */
    'controllers' => \Folklore\GraphQL\GraphQLController::class.'@query',

    /*
     * The name of the input variable that contain variables when you query the
     * endpoint. Most libraries use "variables", you can change it here in case you need it.
     * In previous versions, the default used to be "params"
     */
    'variables_input_name' => 'variables',

    /*
     * Any middleware for the 'graphql' route group
     */
    'middleware' => [],

    /**
     * Any middleware for a specific 'graphql' schema
     */
    'middleware_schema' => [
        'default' => [],
    ],

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     * To disable GraphiQL, set this to null
     */
    'graphiql' => [
        'routes' => '/graphiql/{graphql_schema?}',
        'controller' => \Folklore\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'composer' => \Folklore\GraphQL\View\GraphiQLComposer::class,
    ],

    /*
     * The name of the default schema used when no arguments are provided
     * to GraphQL::schema() or when the route is used without the graphql_schema
     * parameter
     */
    'schema' => 'default',

    /*
     * The schemas for query and/or mutation. It expects an array to provide
     * both the 'query' fields and the 'mutation' fields. You can also
     * provide an GraphQL\Type\Schema object directly.
     *
     * Example:
     *
     * 'schemas' => [
     *     'default' => new Schema($config)
     * ]
     *
     * or
     *
     * 'schemas' => [
     *     'default' => [
     *         'query' => [
     *              'users' => 'App\GraphQL\Query\UsersQuery'
     *          ],
     *          'mutation' => [
     *
     *          ]
     *     ]
     * ]
     */
    'schemas' => [
        'default' => [
            'query' => [
                'users'=> App\GraphQL\Query\User\UsersQuery::class,
                
                'stokDetail'=>App\GraphQL\Query\stokDetailQuery::class,
                'stokHeader'=>App\GraphQL\Query\stokHeaderQuery::class,
                'gudang'=>App\GraphQL\Query\gudangQuery::class,
                'barang'=>App\GraphQL\Query\barangQuery::class,
                'wallet'=>App\GraphQL\Query\walletQuery::class,
                'saldo'=>App\GraphQL\Query\saldoQuery::class,
                'pricing'=>App\GraphQL\Query\pricingQuery::class,
                'sellingList'=>App\GraphQL\Query\sellingListQuery::class,
                'exportRequest'=>App\GraphQL\Query\exportRequestQuery::class,
                'image'=>App\GraphQL\Query\imageQuery::class,
                'pesananHeader'=>App\GraphQL\Query\pesananHeaderQuery::class,
                'status'=>App\GraphQL\Query\statusQuery::class,
                'statusPengiriman'=>App\GraphQL\Query\statusPengirimanQuery::class,
                'pesananDetail'=>App\GraphQL\Query\pesananDetailQuery::class,
                'pengiriman'=>App\GraphQL\Query\pengirimanQuery::class,
                'kategori'=>App\GraphQL\Query\kategoriQuery::class,
                'kategoribarang'=>App\GraphQL\Query\kategoribarangQuery::class,

            ],
            'mutation' => [
                //user
                'Authenticate'		=> App\GraphQL\Mutation\User\Authenticate::class,
				'StoreUser'			=> App\GraphQL\Mutation\User\StoreUser::class,
				'AddUser'			=> App\GraphQL\Mutation\User\AddUser::class,
				'AddOrganization'	=> App\GraphQL\Mutation\User\AddOrganization::class,
				'RemoveOrganization'=> App\GraphQL\Mutation\User\RemoveOrganization::class,
				'AddScope'			=> App\GraphQL\Mutation\User\AddScope::class,
				'RemoveScope'		=> App\GraphQL\Mutation\User\RemoveScope::class,
				'Deactivate'		=> App\GraphQL\Mutation\User\Deactivate::class,
				'resetPassword'		=> App\GraphQL\mutation\User\ResetPassword::class,
				'changeProfile'		=> App\GraphQL\mutation\User\ChangeProfile::class,
				'forgetPassword'	=> App\GraphQL\mutation\User\ForgetPassword::class,
                //gudang
                'newGudang'=>App\GraphQL\Mutation\warehouse\gudang\createGudang::class,
                'delGudang'=>App\GraphQL\Mutation\warehouse\gudang\deleteGudang::class,
                'updateGudang'=>App\GraphQL\Mutation\warehouse\gudang\updateGudang::class,
                //barang
                'newBarang'=>App\GraphQL\Mutation\warehouse\barang\createBarang::class,
                'delBarang'=>App\GraphQL\Mutation\warehouse\barang\deleteBarang::class,
                'updateBarang'=>App\GraphQL\Mutation\warehouse\barang\updateBarang::class,
                //stok header
                'newStokHeader'=>App\GraphQL\Mutation\warehouse\stokHeader\createStokHeader::class,
                'delStokHeader'=>App\GraphQL\Mutation\warehouse\stokHeader\deleteStokHeader::class,
                'updateStokHeader'=>App\GraphQL\Mutation\warehouse\stokHeader\updateStokHeader::class,
                //stok detail
                'newStokDetail'=>App\GraphQL\Mutation\warehouse\stokDetail\createStokDetail::class,
                'delStokDetail'=>App\GraphQL\Mutation\warehouse\stokDetail\deleteStokDetail::class,
                'updateStokDetail'=>App\GraphQL\Mutation\warehouse\stokDetail\updateStokDetail::class,
               //wallet
               'newWallet'=>App\GraphQL\Mutation\walet\wallet\createWallet::class,
                'delWallet'=>App\GraphQL\Mutation\walet\wallet\deleteWallet::class,
                'updateWallet'=>App\GraphQL\Mutation\walet\wallet\updateWallet::class,
                //saldo
               'newSaldo'=>App\GraphQL\Mutation\walet\saldo\createSaldo::class,
               'delSaldo'=>App\GraphQL\Mutation\walet\saldo\deleteSaldo::class,
               'updateSaldo'=>App\GraphQL\Mutation\walet\saldo\updateSaldo::class,
               //pricing
               'newPricing'=>App\GraphQL\Mutation\pricing\createPricing::class,
               'delPricing'=>App\GraphQL\Mutation\pricing\deletePricing::class,
               'updatePricing'=>App\GraphQL\Mutation\pricing\updatePricing::class,
               //selling list
               'newSellingList'=>App\GraphQL\Mutation\selingList\sellingList\createSellingList::class,
               'delSellingList'=>App\GraphQL\Mutation\selingList\sellingList\deleteSellingList::class,
               'updateSellingList'=>App\GraphQL\Mutation\selingList\sellingList\updateSellingList::class,
               //export request
               'newExportRequest'=>App\GraphQL\Mutation\selingList\exportRequest\createExportRequest::class,
               'delExportRequest'=>App\GraphQL\Mutation\selingList\exportRequest\deleteExportRequest::class,
               'updateExportRequest'=>App\GraphQL\Mutation\selingList\exportRequest\updateExportRequest::class,
               //image
               'newImage'=>App\GraphQL\Mutation\warehouse\image\createImage::class,
               'delImage'=>App\GraphQL\Mutation\warehouse\image\deleteImage::class,
               'updateImage'=>App\GraphQL\Mutation\warehouse\image\updateImage::class,
                //pesanan header
                'newPesananHeader'=>App\GraphQL\Mutation\pesanan\pesananHeader\createPesananHeader::class,
                'delPesananHeader'=>App\GraphQL\Mutation\pesanan\pesananHeader\deletePesananHeader::class,
                'updatePesananHeader'=>App\GraphQL\Mutation\pesanan\pesananHeader\updatePesananHeader::class,
               //pesanan detail
               'newPesananDetail'=>App\GraphQL\Mutation\pesanan\pesananDetail\createPesananDetail::class,
               'delPesananDetail'=>App\GraphQL\Mutation\pesanan\pesananDetail\deletePesananDetail::class,
               'updatePesananDetail'=>App\GraphQL\Mutation\pesanan\pesananDetail\updatePesananDetail::class,
              //status
              'newStatus'=>App\GraphQL\Mutation\pesanan\status\createStatus::class,
              'delStatus'=>App\GraphQL\Mutation\pesanan\status\deleteStatus::class,
              'updateStatus'=>App\GraphQL\Mutation\pesanan\status\updateStatus::class,
             //pengiriman
             'newPengiriman'=>App\GraphQL\Mutation\pesanan\pengiriman\createPengiriman::class,
             'delPesananHeader'=>App\GraphQL\Mutation\pesanan\pengiriman\deletePengiriman::class,
             'updatePengiriman'=>App\GraphQL\Mutation\pesanan\pengiriman\updatePengiriman::class,
            //status pengiriman
            'newStatusPengiriman'=>App\GraphQL\Mutation\pesanan\statusPengiriman\createStatusPengiriman::class,
            'delStatusPengiriman'=>App\GraphQL\Mutation\pesanan\statusPengiriman\deleteStatusPengiriman::class,
            'updateStatusPengiriman'=>App\GraphQL\Mutation\pesanan\statusPengiriman\updateStatusPengiriman::class,
           //pesananUser
           'pesan'=>App\GraphQL\Mutation\pesananHeaderUser::class,
            //stok
            'stokBarang'=>App\GraphQL\Mutation\createBarangPrice::class,   
            //stokheader full
            'stokfull'=>App\GraphQL\Mutation\stokHeaderFull::class,   
            //stokDetail full 
            'stokDetailfull'=>App\GraphQL\Mutation\stokDetailFull::class,   
                //cek user
            'cekUser'=>App\GraphQL\Mutation\cekUser::class,   
                //barang full
            'newBarangFull'=>App\GraphQL\Mutation\barangFull::class,   
                // kategori
                'newKategori'=>App\GraphQL\Mutation\warehouse\kategori\createKategori::class,
                'delKategori'=>App\GraphQL\Mutation\warehouse\kategori\deleteKategori::class,
                'updateKategori'=>App\GraphQL\Mutation\warehouse\kategori\updateKategori::class,
               // kategoribarang
               'newKategoriBarang'=>App\GraphQL\Mutation\warehouse\kategori\createKategoriBarang::class,
               'delKategoriBarang'=>App\GraphQL\Mutation\warehouse\kategori\deleteKategoriBarang::class,
               'updateKategoriBarang'=>App\GraphQL\Mutation\warehouse\kategori\updateKategoriBarang::class,
              
               ]
        ]
    ],

    /*
     * Additional resolvers which can also be used with shorthand building of the schema
     * using \GraphQL\Utils::BuildSchema feature
     *
     * Example:
     *
     * 'resolvers' => [
     *     'default' => [
     *         'echo' => function ($root, $args, $context) {
     *              return 'Echo: ' . $args['message'];
     *          },
     *     ],
     * ],
     */
    'resolvers' => [
        'default' => [
        ],
    ],

    /*
     * Overrides the default field resolver
     * Useful to setup default loading of eager relationships
     *
     * Example:
     *
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     *     // take a look at the defaultFieldResolver in
     *     // https://github.com/webonyx/graphql-php/blob/master/src/Executor/Executor.php
     * },
     */
    'defaultFieldResolver' => null,

    /*
     * The types available in the application. You can access them from the
     * facade like this: GraphQL::type('user')
     *
     * Example:
     *
     * 'types' => [
     *     'user' => 'App\GraphQL\Type\UserType'
     * ]
     *
     * or without specifying a key (it will use the ->name property of your type)
     *
     * 'types' =>
     *     'App\GraphQL\Type\UserType'
     * ]
     */
    'types' => [
        'App\GraphQL\Type\gudangType',
        'App\GraphQL\Type\barangType',
        'App\GraphQL\Type\stokHeaderType',
        'App\GraphQL\Type\stokDetailType',
        'App\GraphQL\Type\saldoType',
        'App\GraphQL\Type\walletType',
        'App\GraphQL\Type\pricingType',
        'App\GraphQL\Type\sellingListType',
        'App\GraphQL\Type\exportRequestType',
        'App\GraphQL\Type\imageType',
        'App\GraphQL\Type\pesananHeaderType',
        'App\GraphQL\Type\pengirimanType',
        'App\GraphQL\Type\pesananDetailType',
        'App\GraphQL\Type\statusPengirimanType',
        'App\GraphQL\Type\statusType',
        'App\GraphQL\Type\User\InputLogin',
		'App\GraphQL\Type\User\User',
		'App\GraphQL\Type\User\UserOrganization',
		'App\GraphQL\Type\User\Login',
		'App\GraphQL\Type\User\Authorization',
		'App\GraphQL\Type\User\IUser',
		'App\GraphQL\Type\User\IUserOrganization',
        'App\GraphQL\Type\User\IUserOrganizationScope',
        
		'App\GraphQL\Type\General\IAlamat',
		'App\GraphQL\Type\General\Alamat',

        'App\GraphQL\Type\General\IDimensi',
		'App\GraphQL\Type\General\Dimensi',
    
		'App\GraphQL\Type\General\IGeolocation',
        'App\GraphQL\Type\General\Geolocation',
        
        'App\GraphQL\Type\kategoriType',
        'App\GraphQL\Type\kategoribarangType',


    ],

    /*
     * This callable will receive all the Exception objects that are caught by GraphQL.
     * The method should return an array representing the error.
     *
     * Typically:
     *
     * [
     *     'message' => '',
     *     'locations' => []
     * ]
     */
    'error_formatter' => [\Folklore\GraphQL\GraphQL::class, 'formatError'],

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ]
];
