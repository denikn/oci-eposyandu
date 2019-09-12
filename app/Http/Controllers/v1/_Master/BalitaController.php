<?php

namespace App\Http\Controllers\v1\_Master;

use Laravel\Lumen\Routing\Controller;
use App\Models\v1\_Master\ref_balita;
use App\Models\v1\_Config\cf_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;
use Illuminate\Support\Facades\Hash;

class BalitaController extends Controller
{
    public function index(Request $req){
        $query = ref_balita::with(['refSex', 'refOrtu'])->orderBy('id', $req->sort)->paginate($req->limit);

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
            $query = new ref_balita;
            
            $query->nika = $req->nika;
            $query->no_rm = $req->no_rm;
            $query->name = $req->name;
            $query->sex_id = $req->sex_id;
            $query->pob = $req->pob;
            $query->dob = $req->dob;
            $query->birth_weight = $req->birth_weight;
            $query->birth_height = $req->birth_height;
            $query->head_circ = $req->head_circ;
            $query->status = $req->status;
            $query->ortu_id = $req->ortu_id;

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
        $query = ref_balita::find($id);

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
        $query = ref_balita::find($req->id);
        
        $query->nika = $req->nika;
        $query->no_rm = $req->no_rm;
        $query->name = $req->name;
        $query->sex_id = $req->sex_id;
        $query->pob = $req->pob;
        $query->dob = $req->dob;
        $query->birth_weight = $req->birth_weight;
        $query->birth_height = $req->birth_height;
        $query->head_circ = $req->head_circ;
        $query->status = $req->status;
        $query->ortu_id = $req->ortu_id;

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
