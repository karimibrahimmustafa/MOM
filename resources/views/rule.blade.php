@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('إضافة صلاحية جديدة') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add_rule') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name"  class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>
                        </div>
                        <ul>
                            @foreach ($actions as $action)
                            <li>
                              <div class="form-check rules_select" >
                              <input class="form-check-input" type="checkbox" value="{{$action->id}}" id="defaultCheck1" name = "action{{$action->id}}">
                                <label class="form-check-label" for="defaultCheck1">
                                 {{$action->discription}}
                                </label>
                              </div>
                            @endforeach
                            </li>
                        </ul>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
