<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Car extends Model
{
    use HasFactory;

    protected $table = 'tb_cars';
    protected $primaryKey = 'pk_cars';
    public $timestamps = false;

    public static function getAllRelated($userId)
    {
        return Car::where('fk_users', $userId)->get();
    }

    public static function getById($userId, $carId)
    {
        return Car::where([
            ['fk_users', $userId],
            ['pk_cars', $carId],
        ])->first();
    }

    public static function storeItem(Request $request, $userId)
    {
        $result = false;

        try {
            $car = new Car();
            $car['ds_model'] = $request['tf-model'];
            $car['nu_year'] = $request['tf-year'];
            $car['ds_color'] = $request['tf-color'];
            $car['fk_users'] = $userId;
            $result = $car->save();
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());
        }

        return $result;
    }

    public static function updateItem(Request $request, $userId, $carId)
    {
        $result = false;

        try {
            $result = Car::where([
                ['fk_users', $userId],
                ['pk_cars', $carId],
            ])->update([
                'ds_model' => $request['tf-model'],
                'nu_year' => $request['tf-year'],
                'ds_color' => $request['tf-color'],
            ]);
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());
        }

        return $result;
    }

    public static function deleteItem($userId, $carId)
    {
        $result = false;

        try {
            $result = Car::where([
                ['fk_users', $userId],
                ['pk_cars', $carId],
            ])->delete();
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());
        }

        return $result;
    }
}
