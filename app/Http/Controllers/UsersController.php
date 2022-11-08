<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Log;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //per elencare gli utenti
        // return User::all();

        $take = $request->input('take', 10);
        $skip = $request->input('skip', 0);
        
        $res = [
            'result' => [],
            'message' =>'',
            'status' => true,
            'records'=> 0
        ];
        try{
            $user=new User();
            $user=$user->skip($skip)->take($take);
            $user=$user->get();
            $res['result'] = $user;
            $records = User::all()->count();
            $res['records'] = $records;

        } catch(\Exception $e){
            $res['message'] = $e->getMessage();
            $res['status'] = false;
        }
        return $res;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //per creare un utente
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = [
            'result' => [],
            'message' =>'',
            'status' => true
        ];

        try{

            $userData = $request->except('id');
            $user = new User();
            $user->fill($userData);
            $user->save();
            $res['result'] = $user;

        } catch (\Exception $e){
            $res['status'] = false;
            $res['message'] = $e->getMessage();
        }
        return $res;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $user)
    {
        //mostro un utente, passando l'id
        $res = [
            'result' => [],
            'message' =>'',
            'status' => true,
        ];
        try{
            $res['result'] = User::findOrFail($user);
        } catch(\Exception $e){
            $res['message'] = $e->getMessage();
            $res['status'] = false;
        }
        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $user)
    {
        //aggiornare i dati
        $result = $request->except(['id']);
        $res = [
            'result' => null,
            'message' =>'',
            'status' => true
        ];

        try{

            $User = User::findOrFail($user);  
            $User->update($result);
            $res['result'] = $User;  

        } catch(\Exception $e){
            $res['status'] = false;
            $res['message'] = $e->getMessage();
        }
        return $res;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //eliminare l'utente
        $res = [
            'result' => $user,
            'message' =>'',
            'status' => true
        ];

        try{

            $res['status'] = $user->delete();
            if(!$res['status']){
                $res['message'] = 'utene non cancellato' + $user->id;
            }

        } catch(\Exception $e){
            $res['status'] = false;
            $res['message'] = $e->getMessage();
        }
        return $res;
    }
}
