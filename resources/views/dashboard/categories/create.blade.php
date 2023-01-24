@extends('layouts.dashboard')

@section('title', 'Create Category')

@section('breadcrumb')
@parent
<li class="breadcrumb-item">Categories</li>
<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <form action="{{route('dashboard.categories.store')}}" method="post" class="p-3">

        @include('dashboard.categories._form', [
            'button' => 'Save'
        ])

        </form>
@endsection
