<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hire Manager</title>
</head>
<body>
    


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hire Manager') }}
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
        

                <form action="{{route('save_hire_manager')}}" method="post">
                    @csrf
                   
            <!-- name -->
                <div>
                <x-label for="name" :value="__('Name')" />
                <x-input type="text" value="{{old('name')}}" name="name" class="block mt-1 w-full" class="form-control"  id="name" placeholder="Enter manager name"  />
                </div>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br><br>
                   
            <!-- Email -->
                <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" value="{{old('email')}}" class="block mt-1 w-full" class="form-control" type="text" aria-describedby="emailHelp" name="email" placeholder="Enter manager email" />
                </div>
                 @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br><br>

                <!-- Mobile -->
                <div>
                <x-label for="mobile" :value="__('Mobile')" />
                <x-input id="mobile" value="{{old('mobile')}}" class="block mt-1 w-full" class="form-control" type="number" name="mobile" placeholder="Enter manager mobile" />
                </div>
                 @error('mobile')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <br><br>
            <!-- Save -->        
                    <div class="form-group">
                    <x-button class="ml-3">
                    {{ __('Hire') }}
                   </div>
                    </x-button>
              </form>
                </div>
            </div>
    






            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="row">
                <div class="col-sm-12">
                
                        <h2 style="font-size: 30px; ;" class="font-semibold text-x1 text-gray-800 leading-tight">Manager's List</h2><br>
            
                        <table class="table table-hovered table-stripped">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($manager_list as $index=>$data)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->mobile}}</td>
                                    <td>
                                <a href='edit_manager/{{$data->id}}' class="btn btn-primary">Edit</a>&nbsp;
                                <a href='delete_manager/{{$data->id}}' class="btn btn-danger">Delete</a>
                             </td>
                             </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
</x-app-layout>
</body>
</html>