<?php

namespace App\Http\Controllers\v1\_Tumbang;

use Laravel\Lumen\Routing\Controller;
use App\Models\v1\_Tumbang\trx_imunisasi;
use App\Models\v1\_Config\cf_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;
use Illuminate\Support\Facades\Hash;

class ImunisasiController extends Controller
{
    public function index(Request $req){
        $query = trx_imunisasi::with(['refImunisasi'])->orderBy('id', $req->sort)->paginate($req->limit);

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
            $query = new trx_imunisasi;
            
            $query->visit_date = $req->visit_date;
            $query->imunisasi_id = $req->imunisasi_id;
            $query->place = $req->place;

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
        $query = trx_imunisasi::find($id);

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
        $query = trx_imunisasi::find($req->id);
        
        $query->visit_date = $req->visit_date;
        $query->imunisasi_id = $req->imunisasi_id;
        $query->place = $req->place;

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
