<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Change Password</title>
</head>
<body>
    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        
            {{ __('Change Password') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">

    

                @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
            

                @if(Session::get('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                
        
                <form action="{{route('update_password')}}" method="POST">
                    @csrf
                   
            <!-- old pass -->
                <div>
                <x-label for="old_password" :value="__('Old Password')" />
                <x-input type="password" value="{{old('old_password')}}"  name="old_password"  class="block mt-1 w-full" class="form-control"  id="old_password"  aria-describedby="passwordHelp" />
                </div>
                    @error('old_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br><br>
                   
            <!-- new pass -->
                <div>
                <x-label for="password" :value="__('New Password')" />
                <x-input id="new_password" value="{{old('new_password')}}"  class="block mt-1 w-full" class="form-control" type="password" aria-describedby="passwordHelp" name="new_password" />
                </div>
                 @error('new_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br><br>
            

            <!-- confirm pass -->
            <div>
                <x-label for="confirm_password" :value="__('Confirm Password')" />
                <x-input id="confirm_password" value="{{old('confirm_password')}}"  class="block mt-1 w-full" class="form-control" type="password" aria-describedby="passwordHelp" name="confirm_password" />
                </div>
                 @error('confirm_password')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br><br>

            <!-- Update -->        
                    <div class="form-group">
                    <x-button class="ml-3">
                    {{ __('Update Password') }}
                   </div>
                    </x-button>
              </form>
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
</body>
</html>