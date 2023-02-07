@extends('layouts.dashboard')

@section('title', __('Create Category'))

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Categories') }}</a></li>
<li class="breadcrumb-item active">{{__('Create')}}</li>
@endsection

@section('content')
    <form action="{{route('dashboard.categories.store')}}" method="post" class="p-3" enctype="multipart/form-data">

        @include('dashboard.categories._form', [
            'button' => 'Save'
        ])

        </form>
@endsection
