<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::where('user_id', auth()->id())->get();
        return view('urls.index',compact('urls'));
    }

    public function create()
    {
        return view('urls.create');
    }

    public function store(UrlRequest $request){
        $data = $request->validated();

        Url::create([
            'user_id' => auth()->id(),
            'long_url' => $data['url'],
            'short_url' => Str::random(10),
        ]);

        return redirect()->route('urls.index')->with('success', 'Url created successfully.');
    }

    public function edit($id){
        $url = Url::findOrFail($id);
        return view('urls.edit',compact('url'));
    }

    public function update(UrlRequest $request, $id){
        $data = $request->validated();
        $url = Url::findOrFail($id);
        $url->update([
            'long_url' => $data['url'],
            'short_url' => Str::random(10),
        ]);
        return redirect()->route('urls.index')->with('success', 'Url updated successfully.');
    }

    public function destroy($id){
        $url = Url::findOrFail($id);
        $url->delete();
        return redirect()->route('urls.index')->with('success', 'Url deleted successfully.');
    }

    public function shortenLink($shortener_url)
    {
         $findUrl = Url::where('short_url', $shortener_url)->first();

        if (!$findUrl) {
            abort(404);
        }

        if (auth()->check() && auth()->id() != $findUrl->user_id) {
            $findUrl->increment('clicks');
        } else {
            $findUrl->increment('clicks');
        }

        return redirect($findUrl->long_url);

    }




}
