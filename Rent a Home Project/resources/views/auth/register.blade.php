<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    

<x-guest-layout>
    <x-auth-card>
    <x-slot name="logo">
            <a href="/">
            <p style="color:red">Rent a Home</p>
            </a>
        </x-slot>

        <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" /> 

        <form method="POST" action="{{ route('register') }}">
            @csrf


            @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif

            
                <div class="mt-4">
                <x-label for="role_id" :value="__('Register As')" />

                 <select name="role" type="text" id="role_id" class="block mt-1 w-full"
                                name="role_id" >
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Admin</option>
            </select>
            </div>
            


            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />
               
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
                
            </div>
            
            

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            </div>
           
            

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="form-control" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                 />
            </div>
           

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" />
            </div>
            
            
        

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>

              
        
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</body>
</html>