@extends('layouts.app')

@section('content')

<div class="container">
    @if(in_array("show_user",$actions)!=1)
    <script type="text/javascript">
        window.location.href = "/error";
     </script>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="workers">
        <h1>
            <div class = 'title'>
            العاملين بالشركة
            @if(in_array("add_user",$actions)==1)
            <a class="nav-link" href="{{ route('register') }}">{{ __("تسجيل عامل جديد") }}</a>
            @endif
            </div>
        </h1>
        @foreach ($workers as $worker)
        <div class = "worker" id = "worker{{$worker->id}}">   
        <h3>
        {{$worker->name}}
        @if((in_array("remove_user",$actions)==1) && !(Auth::user()->id == $worker->id))
        <button class="btn btn-danger" onclick="remove_worker({{$worker->id}},'{{ csrf_token() }}')">delete</button>
        @endif
        <select class="form-control" name="type" onchange="change_rule(this,{{$worker->id}},'{{ csrf_token() }}')"
        @if(in_array("modify_user",$actions)!=1)
          disabled
        @endif
        >
            @foreach ($rules as $rule)
               @if($rule->id == $worker->rule->id)
               <option value={{$rule->id}} selected="selected">{{$rule->name}}</option>
               @else
               <option value={{$rule->id}}>{{$rule->name}}</option>
               @endif
            @endforeach
        </select>
        </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection
