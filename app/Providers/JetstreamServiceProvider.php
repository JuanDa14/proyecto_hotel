<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $rol = $user->getRoleNames();
                $verificarRol =  count($rol);
                if ($verificarRol > 0) {
                    if (
                        $user &&
                        Hash::check($request->password, $user->password)
                    ) {
                        return $user;
                    }
                } else {
                    return;
                }
            } else {
                return;
            }
        });
    }

    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
