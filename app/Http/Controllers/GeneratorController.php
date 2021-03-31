<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class GeneratorController extends Controller
{
    //Generate: Model, Controller, Migration, Factory, Seeder, Request e Policy
    public function generateFiles($model) {
        try {
            $model = ucfirst(strtolower($model));
            $modelRequest = $model . "Request";
            $modelPolicy = $model . "Policy";
            Artisan::call("make:model $model -a");
            Artisan::call("make:request $modelRequest");
            Artisan::call("make:policy $modelPolicy --model=$model");
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function verifyFiles($model) {
        $model = ucfirst(strtolower($model));
        $raiz = explode("app\Http\Controllers", __DIR__)[0];
        $responseModel = file_exists(str_replace('archive', $model, $raiz.'app\Models\archive.php'));
        $responseController = file_exists(str_replace('archive', $model.'Controller', $raiz.'app\Http\Controllers\archive.php'));
        $responseRequest = file_exists(str_replace('archive', $model.'Request', $raiz.'app\Http\Requests\archive.php'));
        $responsePolicy = file_exists(str_replace('archive', $model.'Policy', $raiz.'app\Policies\archive.php'));
        $responseFactory = file_exists(str_replace('archive', $model.'Factory', $raiz.'database\factories\archive.php'));
        $responseSeeder = file_exists(str_replace('archive', $model.'Seeder', $raiz.'database\seeders\archive.php'));
        $migrations = scandir($raiz.'database\migrations');
        $responseMigration = false;
        foreach ($migrations as $migration) {
            if(mb_stripos($migration, $model) !== false) {
                $responseMigration = true;
            }
        }
        dd($responseModel, $responseController, $responseRequest, $responsePolicy, $responseFactory, $responseSeeder, $responseMigration);
    }

    public function deleteFiles($model) {
        $model = ucfirst(strtolower($model));
        $raiz = explode("app\Http\Controllers", __DIR__)[0];
        $responseModel = unlink(str_replace('archive', $model, $raiz.'app\Models\archive.php'));
        $responseController = unlink(str_replace('archive', $model.'Controller', $raiz.'app\Http\Controllers\archive.php'));
        $responseRequest = unlink(str_replace('archive', $model.'Request', $raiz.'app\Http\Requests\archive.php'));
        $responsePolicy = unlink(str_replace('archive', $model.'Policy', $raiz.'app\Policies\archive.php'));
        $responseFactory = unlink(str_replace('archive', $model.'Factory', $raiz.'database\factories\archive.php'));
        $responseSeeder = unlink(str_replace('archive', $model.'Seeder', $raiz.'database\seeders\archive.php'));
        $migrations = scandir($raiz.'database\migrations');
        $responseMigration = false;
        foreach ($migrations as $migration) {
            if(mb_stripos($migration, $model) !== false) {
                $responseMigration = unlink(str_replace('archive', $migration, $raiz.'database\migrations\archive'));
            }
        }
        dd($responseModel, $responseController, $responseRequest, $responsePolicy, $responseFactory, $responseSeeder, $responseMigration);
    }

    public function alterBodyFiles($model) {
        dd("stop");
    }
}
