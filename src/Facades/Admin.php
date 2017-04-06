<?php

namespace CODE4FUN\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Admin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CODE4FUN\Admin\Admin::class;
    }
}
