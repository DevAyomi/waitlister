<?php

namespace App\Http\Controllers;

use App\Models\AssetLister;
use App\Models\Investor;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class WaitlisterController extends Controller
{
    use ApiResponder

    public function create(Request $request){
        if ($request->has('description')) {
            
            return "This user is an asset lister";
        }
    }
}
