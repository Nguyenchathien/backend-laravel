<?php

namespace Code4fun\Admin\Middleware;

use Code4fun\Admin\Facades\Admin;
use Illuminate\Http\Request;

class OperationLog
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if (config('admin.operation_log') && Admin::user()) {
            $log = [
                'user_id' => Admin::user()->id,
                'path'    => $request->path(),
                'method'  => $request->method(),
                'ip'      => $request->getClientIp(),
                'input'   => json_encode($request->input()),
            ];

            \Code4fun\Admin\Auth\Database\OperationLog::create($log);
        }

        return $next($request);
    }
}
