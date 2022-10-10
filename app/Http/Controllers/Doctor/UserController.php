<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    protected $validation_rules = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email' => ['required', 'string', 'max:255'],
        'photo' => 'nullable|file|image|max:2056',
        'phone' => 'nullable|string|max:255',
        'service' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'postal_code' => 'required|integer',
        'cv' => 'required|min:10|max:10000',
        'specializations' => 'required|array',
        'specializations.*' => 'required|integer|exists:specializations,id'
    ];

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $profile)
    {
        if ($profile === Auth::id()) {
            $user = User::all()->where('id', $profile)->first();
            return view('doctor.profile.show', [
                'user' => $user
            ]);
        } else {
            return redirect()->route('doctor.dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(int $profile)
    {
        if ($profile === Auth::id()) {
            $user = User::all()->where('id', $profile)->first();
            $specializations = Specialization::all();
            return view('doctor.profile.edit', [
                'user' => $user,
                'specializations' => $specializations
            ]);
        } else {
            return redirect()->route('doctor.dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        if ($profile->id === Auth::id()) {
            $this->validation_rules['email'][] = Rule::unique('users')->ignore($profile->id);
            $request->validate($this->validation_rules);
            $data = $request->all();
            if (key_exists('photo', $data)) {
                // salvare l'immagine in public
                $img_path = Storage::put('uploads', $data['photo']);

                // aggiornare il valore della chiave image con il nome dell'immagine appena creata
                $data['photo'] = $img_path;
            };
            $profile->update($data);
            $profile->specializations()->sync($data['specializations']);
            return redirect()->route('doctor.profile.show', $profile);
        } else {
            return view('doctor.dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $profile)
    {
        if (Auth::id() === $profile->id) {
            if (Hash::check($request['password'], $profile->password)) {
                $profile->specializations()->detach();
                $profile->sponsorships()->detach();
                $profile->messages()->delete();
                $profile->reviews()->delete();
                $profile->delete();
                return redirect()->route('home');
            } else {
                return redirect()->route('doctor.profile.show', $profile);
            }
        }
        return redirect()->route('doctor.dashboard');
    }
}
