<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Users list</title>
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        
            {{ __('All Users') }}
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

    <table style="border-collapse: collapse" class="table table-hovered table-stripped">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Ban or Unban</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

@foreach($allUser as $User)
<tr>
    <td>{{$User->id}}</td>
    <td>{{$User->name}}</td>
    <td>{{$User->email}}</td>
    <td>
        @if($User->status == '0')
        <label class="btn btn-primary">Not Banned</label>
        @elseif($User->status =='1')
        <label class="btn btn-danger">Banned</label>
       @endif
    </td>
    <td>
    <a href='user_edit/{{$User->id}}' class="btn btn-danger">Edit</a>
    </td>
</tr>
@endforeach


@foreach($allManager as $Manager)
<tr>
    <td> {{$Manager->id+1}}</td>
    <td> {{$Manager->name}}</td>
    <td> {{$Manager->email}}</td>
    <td>
    <label class="btn btn-primary">Not Banned</label>   
    </td>
    <td>
    <a href='' class="btn btn-danger">Edit</a>
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