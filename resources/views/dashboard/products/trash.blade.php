@extends('layouts.dashboard')

@section('title', __('Products'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Products') }}</a></li>
@endsection

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

<div class="table-toolbar mb-3 d-flex justify-content-between p-3">
    <div class="">
        {{-- <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Create') }}</a> --}}
        <a href="{{ route('dashboard.products.index') }}" class="btn btn-sm btn-outline-success">{{ __('Products') }}</a>
    </div>
</div>

<div class="table-responsive  p-3">
    <table class="table">
        <thead>
            <tr>
                <th>{{ Lang::get('ID') }}</th>
                <th>{{ trans('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ trans('Price') }}</th>
                <th>{{ trans('Image') }}</th>
                <th>@lang('Created At')</th>
                <th colspan="2">{{ __('app.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_name ?? '' }}</td>
                <td>{{ $product->price }}</td>

                <td>
                    <img src="/storage/{{ $product->image }}" height="100">
                <td>{{ $product->created_at }}</td>
                <td>
                    {{-- @if (Auth::user()->can('categories.update')) --}}
                    <a href="{{ route('dashboard.categories.restore', [$product->id]) }}" class="btn btn-sm btn-outline-success">{{ __('Restore') }}</a>
                    {{-- @endif --}}
                </td>
                <td>
                    {{-- @can('categories.delete') --}}
                    <form action="{{ route('dashboard.categories.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('Delete') }}</button>
                    </form>
                    {{-- @endcan --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $('.alert').alert('close')
        }, 7000);
    });
</script>
@endpush
