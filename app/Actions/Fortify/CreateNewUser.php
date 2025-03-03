<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        //referans no kontrol
        if($input['reference']==='CODE23'){
            return User::create([
                'name' => $input['name'],
                'surname' => $input['surname'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
        }else{
           abort(403);
        }


//        $user = User::created([
//            'name' => $input['name'],
//            'surname' => $input['surname'],
//            'email' => $input['email'],
//            'password' => Hash::make($input['password']),
//        ]);
//
//        return $user; ---> bu yapı ile bizim aşşağıda yaptığımız yapı ve jetstreamin kendi yapısı ile aynı yapıdır.

//        $user = new User();
//        $user->name = $input['name'];
//        $user->surname = $input['surname'];
//        $user->email = $input['email'];
//        $user->password = Hash::make($input['password']);
//        $user->save();



    }
}
