@extends('layouts.dashboard')

@section('title', __('Edit Category'))

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Categories') }}</a></li>
<li class="breadcrumb-item active"><a href="">{{ __('Edit') }}</a></li>
@endsection

@section('content')

<form action="{{ route('dashboard.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
    <!-- Form Method Spoofing -->
    @method('put')
    {{--
    <input type="hidden" name="_method" value="put">
    --}}

    @include('dashboard.categories._form', [
        'button' => 'Update'
    ])

</form>

@endsection
