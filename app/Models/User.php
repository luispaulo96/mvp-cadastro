<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class User extends Model
{
    use HasFactory;

    protected $table = 'tb_users';
    protected $primaryKey = 'pk_users';
    public $timestamps = false;

    public static function authenticate(Request $request)
    {
        $user = User::where('cd_email', $request['tf-login-email'])->first();

        if (empty(Hash::check($request['tf-login-password'], $user['cd_password'] ?? ''))) {
            return [];
        }

        return $user;
    }

    public static function register(Request $request)
    {
        $result = false;

        try {
            $user = new User();
            $user['ds_name'] = $request['tf-name'];
            $user['cd_email'] = $request['tf-email'];
            $user['cd_password'] = Hash::make($request['tf-password']);
            $result = $user->save();
        } catch (QueryException $ex) {
            Log::error($ex->getMessage());
        }

        return $result;
    }
}
