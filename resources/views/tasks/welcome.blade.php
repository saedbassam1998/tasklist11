@extends('layouts.app')

@section('title', ' Task list')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('tittel')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        body {
            font-family: 'Lato';
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="#">
                    Task List
                </a>
            </div>

        </div>
    </nav>

    <div class="container">
        
<div class="col-sm-offset-2 col-sm-8"> 
    <div class="panel panel-default">
        <div class="panel-heading">
            New Task
        </div>

        <div class="panel-body">
            <!-- Display Validation Errors -->
            <!-- New Task Form -->
            @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                </div>
            @endif
                              


            <form action="store" method="POST" class="form-horizontal">
                @csrf   

                <!-- Task Name -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="" >
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            
                        <tr>
                            <td class="table-text">
                                <div> {{$task ->name}}</div></td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="delete/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                            <!-- Task EDIT Button -->
                            <td>
                                <form action="edit/{{$task->id}}" method="POST">
                                    @csrf
                                
                                
                                    <button type="submit" class="btn btn-success">
                                     <i class="fa-li fa fa-check-square">    EDIT</i>   EDIT
                                    </button>
                                </form>
                            </td>
                        
                        
                        </tr>
                    
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
</div>


</div>
    
</body>
</html>
@endsection