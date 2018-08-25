<?php

namespace App\Providers;

///////////////
// Framework //
///////////////
use Illuminate\Support\ServiceProvider;

///////////////
// Observers //
///////////////
use App\Otorisasi\Observers\GenerateUUID;
use App\Otorisasi\Observers\Validate;

class OtorisasiServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		////////////////
		// Migrations //
		////////////////
		$this->loadMigrationsFrom(__DIR__.'/Migrations');

		////////////////////
		// Event Listener //
		////////////////////
		Models\Tenant::observe(new GenerateUUID);
		Models\User::observe(new Validate);
	}

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		config()->set('otorisasi.owner.default', ['reservasi', 'pos', 'voucher', 'rating', 'akunting', 'audit']);
	}
}
