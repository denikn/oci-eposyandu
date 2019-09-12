<?php

namespace App\Http\Controllers\v1\_Tumbang;

use Laravel\Lumen\Routing\Controller;
use App\Models\v1\_Tumbang\trx_pertumbuhan;
use App\Models\v1\_Config\cf_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;
use Illuminate\Support\Facades\Hash;

class PertumbuhanController extends Controller
{
    public function index(Request $req){
        $query = trx_pertumbuhan::where('balita_id', $req->balita_id)->with(['refBalita', 'refPosyandu'])->orderBy('id', $req->sort)->paginate($req->limit);

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
            $query = new trx_pertumbuhan;
            
            $query->visit_date = $req->visit_date;
            $query->posyandu_id = $req->posyandu_id;
            $query->balita_id = $req->balita_id;
            $query->weight = $req->weight;
            $query->height = $req->height;
            $query->head_circ = $req->head_circ;

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
        $query = trx_pertumbuhan::find($id);

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
        $query = trx_pertumbuhan::find($req->id);
        
        $query->visit_date = $req->visit_date;
        $query->posyandu_id = $req->posyandu_id;
        $query->balita_id = $req->balita_id;
        $query->weight = $req->weight;
        $query->height = $req->height;
        $query->head_circ = $req->head_circ;

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
