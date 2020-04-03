<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\City;
use App\Http\Requests\AdRequest;
use App\Image;
use App\Repositories\AdsRepositoryInterface;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('ad.index', [
            'ads' => Ad::simplePaginate(3)
        ]);
    }

    public function create()
    {
        return view('ad.create', [
            'categories' => Category::all(),
            'cities' => City::all(),
        ]);
    }

    public function store(AdRequest $request)
    {
        $ad = Ad::create([
            'user_id' => auth()->user()->id,
            'city_id' => $request->input('city_id'),
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'currency' => $request->input('currency'),
            'description' => $request->input('description'),
        ]);

        if (($request->file('images'))) {
            $main = 1;
            foreach (array_keys($request->file('images')) as $index) {
                $path = $request->file('images.' . $index)->store('ads');
                Image::create([
                    'ad_id' => $ad->id,
                    'name' => $path,
                    'main' => $main
                ]);
                $main = 0;
            }
        }


        return redirect('/ads/' . $ad->id);
    }

    public function show(Ad $ad)
    {
        return view('ad.show', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }

    public function search(AdsRepositoryInterface $adsRepository, Request $request)
    {
        $ads = $adsRepository->search($request->input('query'));

        return view('ad.search', compact('ads'));
    }
}
