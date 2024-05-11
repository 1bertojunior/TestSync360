<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        try {
            $request->input('city');
            $request->input('state');

            $city = City::where('name', $request->input('city'))
                ->whereHas('state', function ($query) use ($request) {
                    $query->where('abb', $request->input('state'));
                })->first();
            
            if (!$city) {
                $state = State::where('abb', $request->input('state'))->firstOrFail();
                $city = new City();
                $city->name = $request->input('city');
                $city->abb = "";
                $city->state_id = $state->id;
                $city->save();
            }

            $city_id = $city->id;
            $postal_code  = str_replace('-', '', strval($request->input('postal_code')));
            
            $address = new Address();
            $address->user_id = Auth::id();
            $address->street = $request->input('street');
            $address->neighborhood = $request->input('neighborhood');
            $address->postal_code = $postal_code;
            $address->number = $request->input('number') ?? null;
            $address->complement = $request->input('complement') ?? null;
            $address->city_id = $city_id;

            $address->save();
            return response()->json(['message' => 'Endereço cadastrado com sucesso', 'city' =>  $city ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro ao cadastrar o endereço'], 500);
        }
        
    }

    public function update(Request $request)
    {
        try {
            $userId = Auth::id();
            $address = Address::where('user_id', $userId)->first();

            if ($address) {
                $city = City::firstOrCreate(['name' => $request->input('city')]);

                $city->abb = "";
                $city->save();
                $address->street = $request->input('street');
                $address->neighborhood = $request->input('neighborhood');
                $address->postal_code = $request->input('postal_code');
                $address->number = $request->input('number') ?? null;
                $address->complement = $request->input('complement') ?? null;
                $address->city_id = $city->id;

                $address->save();
                return response()->json(['message' => 'Endereço atualizado com sucesso', 'address' => $address], 200);
                
            }else{
                return response()->json(['error' => 'Nenhum endereço encontrado para este usuário'], 404);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocorreu um erro ao atualizar o endereço'], 500);
        }
    }


    public function getUserAddress()  {
        $userId = Auth::id();
    
        if ($userId) {
            $address = Address::where('user_id', $userId)->latest()->first();
    
            if ($address) {
                return response()->json([
                    'street' => $address->street,
                    'neighborhood' => $address->neighborhood,
                    'city' => $address->city->name,
                    'state' => $address->city->state->abb,
                    'number' => $address->number,
                    'postal_code' => $address->postal_code
                ]);
            } else {
                return response()->json(['error' => 'Endereço não encontrado para o usuário.']);
            }
        } else {
            return response()->json(['error' => 'Erro ao consultar endereço: usuário não autenticado.']);
        }
    }

    

}
