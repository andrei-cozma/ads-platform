<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Repositories\AdsRepositoryInterface;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return view('ad.index', [
            'ads' => Ad::take(10)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'city_id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'numeric',
            'currency' => 'string',
            'description' => 'required|string'
        ]);

        $ad = new Ad;
        $ad->user_id = auth()->user()->id;
        $ad->city_id = $validatedData['city_id'];
        $ad->name = $validatedData['name'];
        $ad->price = $validatedData['price'];
        $ad->currency = $validatedData['currency'];
        $ad->description = $validatedData['description'];
        $ad->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
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
