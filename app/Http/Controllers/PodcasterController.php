<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Podcaster;
use App\Models\Tag;
use App\Models\Channel;
use Str;

class PodcasterController extends Controller
{
    public function index()
    {
        $podcasters = Podcaster::with('user', 'tags')->get();
        return response()->json($podcasters);
    }

    public function becomePodcasterForm()
    {
        $tags = Tag::all();
        return view('dashboard.become-podcaster', compact('tags'));
    }
    public function becomePodcaster(Request $request)
    {
        $request->validate([
            "bio" => "required|string|max:1000",
            "nationality" => "required|string|max:255",
            'tags' => 'required|array|min:1',
            'tags.*' => 'exists:tags,id',
            'id_type' => 'required|in:passport,national_id,driver_license',
            'id_number' => 'required|string|max:255|unique:podcasters,id_number',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'discord' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request->all());

        $user = Auth::user();

        if ($user->is_podcaster) {
            return response()->json(['message' => 'Already a podcaster'], 400);
        }

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        $podcaster = Podcaster::create([
            'user_id' => $user->id,
            'bio' => $request->bio,
            'nationality' => $request->nationality,
            'id_type' => $request->id_type,
            'id_number' => $request->id_number,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'discord' => $request->discord,
            'avatar' => $avatarPath,
        ]);

        $podcaster->tags()->attach($request->tags);

        // $user->is_podcaster = true;
        // $user->save();

        return redirect()->route('dashboard')->with('success', 'You are now a podcaster!');
    }

}
