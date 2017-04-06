<?php

namespace CODE4FUN\Admin\Middleware;

use CODE4FUN\Admin\Form;
use CODE4FUN\Admin\Grid;
use Illuminate\Http\Request;

class BootstrapMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        Form::registerBuiltinFields();

        if (file_exists($bootstrap = admin_path('bootstrap.php'))) {
            require $bootstrap;
        }

        Form::collectFieldAssets();

        Grid::registerColumnDisplayer();

        return $next($request);
    }
}
