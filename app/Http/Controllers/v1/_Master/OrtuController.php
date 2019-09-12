<?php

namespace App\Http\Controllers\v1\_Master;

use Laravel\Lumen\Routing\Controller;
use App\Models\v1\_Master\ref_ortu;
use App\Models\v1\_Config\cf_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;
use Illuminate\Support\Facades\Hash;

class OrtuController extends Controller
{
    public function index(Request $req){
        $query = ref_ortu::with(['refSex', 'cfUser'])->orderBy('id', $req->sort)->paginate($req->limit);

        if ($query->isEmpty()){
            return response()->json([
                'code' => 400,
                'status' => 'not found.',
                'data' => []
            ], 400);
        } else {
            return response()->json([
                'code' => 200,
                'status' => 'success.',
                'data' =>
                    $query
            ], 200);
        }
    }

    public function create(Request $req){
        try {
            $user = new cf_users;

            $user->fullname = $req->name;
            $user->username = $req->username;
            $user->password = Hash::make($req->password); // di hash dulu
            $user->role = 5;
            $user->status = 1;

            $user->save();

            $getUser = cf_users::orderBy('id', 'DESC')->first();
            
            $query = new ref_ortu;
            $query->user_id = $getUser->id;
            
            $query->nik = $req->nik;
            $query->no_kk = $req->no_kk;
            $query->name = $req->name;
            $query->sex_id = $req->sex_id;
            $query->pob = $req->pob;
            $query->dob = $req->dob;
            $query->phone = $req->phone;
            $query->email = $req->email;
            $query->address = $req->address;

            if ($query->save()){
                return response()->json([
                    'code' => 200,
                    'status' => 'success',
                    'data' => $query
                ], 200);
            } else {
                return response()->json([
                    'code' => 400,
                    'status' => 'failed.',
                    'data' => []
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 401,
                'status' => 'precondition failed.',
                'data' => $th
            ], 401);
        }
    }

    public function delete($id){
        $query = ref_ortu::find($id);
        $user = cf_users::find($query->user_id);

        $user->delete();

        if ($query->delete()){
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $query
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => 'failed.',
                'data' => []
            ], 400);
        }
    }

    public function update(request $req){
        $query = ref_ortu::find($req->id);
        
        $query->nik = $req->nik;
        $query->no_kk = $req->no_kk;
        $query->name = $req->name;
        $query->sex_id = $req->sex_id;
        $query->pob = $req->pob;
        $query->dob = $req->dob;
        $query->phone = $req->phone;
        $query->email = $req->email;
        $query->address = $req->address;

        
        $user = cf_users::find($query->user_id);

        $user->fullname = $req->name;
        $user->username = $req->username;
        $user->password = Hash::make($req->password); // di hash dulu
        $user->role = 5;
        $user->status = 1;

        $user->save();

        if ($query->save()){
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'data' => $query
            ], 200);
        } else {
            return response()->json([
                'code' => 400,
                'status' => 'failed.',
                'data' => []
            ], 400);
        }
    }
}
