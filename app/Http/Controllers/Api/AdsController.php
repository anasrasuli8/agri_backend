<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdsRequest;
use App\Http\Resources\AdsResource;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function store(StoreAdsRequest $request){
        $path = $request->file('photo')->store('public/images/ads');
        $request['image'] = Storage::url($path);

        return auth()->user()->ads()->create($request->except('photo'));
    }
    public function index(Request $request){
        $ads = Ads::latest();
        if($request->category){
            $ads->where('category_id',$request->category);
        }
        return AdsResource::collection($ads->get(['id','name','image','price']));
    }
    public function getAd($id){
        $ads = Ads::find($id);

        return new AdsResource($ads);
    }
}
