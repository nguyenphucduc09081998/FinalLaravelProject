<?php 
namespace App\Http\Services;

use App\Entities\Account;
use Illuminate\Support\Facades\Request;

class AccountService {

    public function create($request){
        $date = $request->all();
        $account = Account::create($data);
        dd($account);
        return response()->json($account);
    }


}









?>