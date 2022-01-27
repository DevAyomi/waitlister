<?php

namespace App\Http\Controllers;

use App\Models\AssetLister;
use App\Models\Investor;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class WaitlisterController extends Controller
{
    use ApiResponder;

    public function create(Request $request){

        //Check if request have description or not
        if ($request->has('description')) {

            //Validate Request
            $attr = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:asset_listers,email',
                'description' => 'required|string|max:255'
            ]);


           $assetLister =  AssetLister::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'description' => $request->description,
           ]); 

           return $this->success([
               'message' => 'AssetLister added successfully with description',
              'assetLister' => $assetLister,
           ]);
           
        }else{
            $attr = $request->validate([
                'fullname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:investors,email',
            ]);

             $assetLister =  Investor::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
             ]); 

           return $this->success([
               'message' => 'Investor added successfully without description',
              'assetLister' => $assetLister,
           ]);
        }
    }
}
