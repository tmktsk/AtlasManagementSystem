<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        // セッションが切れているかどうかをチェック
        if (!auth()->check()) {
            // ログアウト処理
            auth()->logout();

            // ログイン画面にリダイレクト
            return route('login');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
