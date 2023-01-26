@extends('layouts.dashboard')

@section('title', __('Edit Product'))

@section('breadcrumb')
@parent
<li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Products') }}</a></li>
<li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('content')

<form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    <!-- Form Method Spoofing -->
    @method('put')
    {{--
    <input type="hidden" name="_method" value="put">
    --}}

    @include('dashboard.products._form', [
        'button' => 'Update'
    ])

</form>

@endsection
