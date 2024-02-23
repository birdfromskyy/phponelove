<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
        public function phpInfo()
        {
            // Возвращаем данные в формате JSON
            return response()->json(['php_info' => $phpInfo = phpversion()]);
        }

        public function clientInfo(Request $request)
        {
            // Получаем IP и User-Agent клиента
            $ip = $request->ip();
            $userAgent = $request->header('User-Agent');

            // Возвращаем данные в формате JSON
            return response()->json(['ip' => $ip, 'user_agent' => $userAgent]);
        }

        public function databaseInfo()
        {
            // Получаем информацию о базе данных
            $databaseInfo = [
                'driver' => config('database.default'),
                'host' => config('database.connections.' . config('database.default') . '.host'),
                // Добавьте другие необходимые данные о базе данных
            ];

            // Возвращаем данные в формате JSON
            return response()->json(['database_info' => $databaseInfo]);
        }

}
