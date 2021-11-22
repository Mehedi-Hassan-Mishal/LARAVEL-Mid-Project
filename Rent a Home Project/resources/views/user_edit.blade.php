<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Manager</title>
</head>
<body>
    


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Manager Details') }}
        </h2>
    </x-slot>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               

                @if(Session::get('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
        

                <form action="{{route('update_user')}}" method="post">
                    @csrf

             <input type="hidden" name="id" value="{{$data->id}}">
<h5>
isBan Status:
             @if($data->status == '0')
        <label class="btn btn-primary">Not Banned</label>
        @elseif($data->status =='1')
        <label class="btn btn-danger">Banned</label>
       @endif
</h5>
                   
            <!-- name -->
                <div>
                <x-label for="name" :value="__('Name')" />
                <x-input type="text" value="{{$data->name}}" name="name" class="block mt-1 w-full" class="form-control"  id="name" placeholder="Enter manager name"  />
                </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br>
                   
            <!-- Email -->
                <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" value="{{$data->email}}" class="block mt-1 w-full" class="form-control" type="text" aria-describedby="emailHelp" name="email" placeholder="Enter manager email" />
                </div>
                 @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
           <div class="form-group">
               <select name="status" class="form-control">
                   <option value="">--Select Ban and Un-Ban--</option>
                   <option value="0">Un-Ban</option>
                   <option value="1">Ban now</option>
               </select>
           </div>
           <br>


               
            <!-- Save -->        
                    <div class="form-group">
                    <x-button class="ml-3">
                    {{ __('Save') }}
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