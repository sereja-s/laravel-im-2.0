<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		// Получим пользователя
		// (т.к. мы авторизоаны, у нас есть возможность получить пользователя, через фасад: Auth-статичный класс, который закрывает наш функционал)
		$user = Auth::user();

		if (!$user->isAdmin()) {

			// добавим в сессию сообщение
			session()->flash('warning', 'У вас нет прав администратора');

			return redirect()->route('index');
		}

		return $next($request);
	}
}
