@extends('layouts.app')

@section('content')
<div class="container">
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
            @if(Auth::user()->type == "أدمن")
            <a class="nav-link" href="{{ route('register') }}">{{ __("تسجيل عامل جديد") }}</a>
            @endif
            </div>
        </h1>
        <h2>
            الأدمنز
        </h2>
        @foreach ($admins as $admin)
        <div class = "worker" id = "worker{{$admin->id}}">   
        <h3>
        {{$admin->name}}
        @if(Auth::user()->type == "أدمن" && !(Auth::user()->id == $admin->id))
        <button class="btn btn-danger" onclick="remove_worker({{$admin->id}},'{{ csrf_token() }}')">delete</button>
        @endif
        </h3>
        </div>
        @endforeach
        <h2>
            الموظفين
        </h2>
        @foreach ($workers as $worker)
        <div class = "worker" id = "worker{{$worker->id}}">   
        <h3>
        {{$worker->name}}
        @if(Auth::user()->type == "أدمن")
        <button class="btn btn-danger" onclick="remove_worker({{$worker->id}},'{{ csrf_token() }}')">delete</button>
        @endif
        </h3>
        </div>
        @endforeach
        <h2>
           خدمة العملاء
        </h2>
        @foreach ($service as $worker)
        <div class = "worker" id = "worker{{$worker->id}}">   
        <h3>
        {{$worker->name}}
        @if(Auth::user()->type == "أدمن")
        <button class="btn btn-danger" onclick="remove_worker({{$worker->id}},'{{ csrf_token() }}')">delete</button>
        @endif
        </h3>
        </div>
        @endforeach
    </div>
</div>
@endsection
