@extends('layouts.dashboard')

@section('title', 'Create Product')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="{{route('dashboard.products.index')}}">{{ __('products') }}</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <form action="{{route('dashboard.products.store')}}" method="post" class="p-3" enctype="multipart/form-data">

        @include('dashboard.products._form', [
            'button' => 'Save'
        ])

        </form>
@endsection
