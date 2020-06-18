<?php 
namespace App\Http\Services;

use App\Model\Account;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;

class AccountService {

    public function create($request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $account = Account::create($data);
       // dd($account);
        return response()->json($account);
       
    }


}









?>