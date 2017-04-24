<?php

namespace Code4fun\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Code4fun\Admin\Admin::class;
    }
}
