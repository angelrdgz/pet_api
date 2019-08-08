<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Pet;
use Validator;
use App\Http\Controllers\Controller;

class PetController extends Controller
{
    public function index(Request $request)
    {
        $pets = $request->user()->pets;
        return response()->json(['data' => $pets], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'birth_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $pet = new Pet();
        $pet->owner_id = $request->user()->id;
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->birth_date = $request->birth_date;
        $pet->save();

        return response()->json(['message' => "Pet saved successfully"], 200);
    }

    public function show($id)
    {
        $pet = Pet::find($id);

        if (is_null($pet)) {
            return response()->json(["Pet not found"], 420);
        } else {
            return response()->json(["data"=>$pet], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'birth_date' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $pet = Pet::find($id);

        if (is_null($pet)) {
            return response()->json(["Pet not found"], 420);
        } else {
            $pet->name = $request->name;
            $pet->age = $request->age;
            $pet->birth_date = $request->birth_date;
            $pet->save();

            return response()->json(['message' => "Pet updated successfully"], 200);
        }
    }

    public function destroy($id)
    {
        $pet = Pet::find($id);

        if (is_null($pet)) {
            return response()->json(["Pet not found"], 420);
        } else {
            $pet->delete();
            return response()->json(['message' => "Pet deleted successfully"], 200);
        }
    }
}
