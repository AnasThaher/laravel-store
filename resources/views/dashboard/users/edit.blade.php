@extends('layouts.dashboard')

@section('title', __('Edit User'))

@section('breadcrumb')
@parent
<li class="breadcrumb-item">{{ __('Users') }}</li>
<li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('content')

<form action="{{ route('dashboard.users.update', $user->id) }}" method="post" class="p-3">
    @method('put')

    @include('dashboard.users._form', [
        'button' => 'Update'
    ])

</form>

@endsection
