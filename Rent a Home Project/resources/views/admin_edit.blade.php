<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin Edit</title>
</head>
<body>
    


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Profile') }}
        </h2>
    </x-slot>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close", data-dismiss="alert" arial-label="Close">
                    </button>
                </div>
                @endif
                <form action="{{route('update')}}" method="POST">
                    @csrf
                   
            <!-- name -->
                <div>
                <x-label for="exampleInputEmail" :value="__('Name')" />
                <x-input type="text" name="name"  class="block mt-1 w-full" class="form-control"  id="exampleInputEmail"  aria-describedby="emailHelp" />
                </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br><br>
                   
            <!-- Email -->
                <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" class="form-control" type="text" aria-describedby="emailHelp" name="email" />
                </div>
                 @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br><br>
            <!-- Update -->        
                    <div class="form-group">
                    <x-button class="ml-3">
                    {{ __('Update') }}
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