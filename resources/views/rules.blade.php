@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">الصلاحيات</div>
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
            @if(in_array("change_rule",session()->get('Actions'))==1)
            <a class="nav-link" href="{{ route('rule') }}">{{ __("إضافة صلاحية جديدة") }}</a>
            @endif
            </div>
        </h1>
        <h2>
            الأدمنز
        </h2>
        @foreach ($rules as $rule)
        <div class = "worker" id = "rule{{$rule->id}}">   
        <h3>
        {{$rule->name}}
        @if((in_array("change_rule",session()->get('Actions')))==1 && !($rule->name=="أدمن رئيسي"))
        <button class="btn btn-danger" onclick="remove_rule({{$rule->id}},'{{ csrf_token() }}')">delete</button>
        @endif
        </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection
