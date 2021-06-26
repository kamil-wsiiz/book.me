<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    public function show(Request $request) {
        $where = [
            ['publish', true]
        ];

        if ($request->has('search')) {
            $where[] = ['name', 'like', '%' . $request->input('search') . '%'];
        }

        $providers = Provider::where($where)->get();

        return view('providers')->with(['providers' => $providers]);
    }

    public function showProvider($id) {
        $provider = Provider::findOrFail($id);
        return view('provider')->with(['provider' => $provider]);
    }

    public function save(ProviderRequest $request) {
        $provider = Provider::find(Auth::user()->provider_id);
        $provider->opening_from = $request->input('opening_from');
        $provider->opening_to = $request->input('opening_to');
        $provider->publish = $request->input('publish');
        $provider->save();

        return view('profile.provider')->with('message_profile', __('Zapisano zmiany'));
    }
}
