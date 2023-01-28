@extends('layouts.dashboard')

@section('title', __('Products'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Products') }}</a></li>
@endsection

@section('content')
<x-flash-message class="info" />

<div class="table-toolbar mb-3 d-flex justify-content-between p-3">
    <div class="">
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Create') }}</a>
        <a href="{{ route('dashboard.products.trash') }}" class="btn btn-sm btn-outline-success">{{ __('Trash') }}</a>
    </div>
    <div class="">
        <form action="{{ route('dashboard.products.index') }}" class="d-flex" method="get">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control">
            <button type="submit" class="btn btn-dark ml-2">{{ trans('Search') }}</button>
        </form>
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
                <th>{{ trans('SKU') }}</th>
                <th>{{ trans('Qty.') }}</th>
                <th>{{ trans('Status') }}</th>
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
                <td>{{ $product->sku }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>

                <td>
                    <img src="/storage/{{ $product->image }}" height="100">
                <td>{{ $product->created_at }}</td>
                <td>
                    {{-- @if (Auth::user()->can('categories.update')) --}}
                    <a href="{{ route('dashboard.products.edit', [$product->id]) }}" class="btn btn-sm btn-outline-success">{{ __('Edit') }}</a>
                    {{-- @endif --}}
                </td>
                <td>
                    {{-- @can('categories.delete') --}}
                    <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
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
