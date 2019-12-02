<?php

namespace Lacomita\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Lacomita\Models\Cotizacion' => 'Lacomita\Policies\CotizacionPolicy',
        'Lacomita\Models\Pedido' => 'Lacomita\Policies\PedidoPolicy',
        'Lacomita\Models\Carrito' => 'Lacomita\Policies\CarritoPolicy',
        'Lacomita\Models\Producto' => 'Lacomita\Policies\ProductoPolicy',
        'Lacomita\Models\Categoria' => 'Lacomita\Policies\ComplementoPolicy',
        'Lacomita\Models\Venta' => 'Lacomita\Policies\VentaPolicy',
        'Lacomita\User' => 'Lacomita\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
