@extends('layouts.dashboard')

@section('title', __('Categories'))

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Categories') }}</a></li>
@endsection

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

<div class="table-toolbar mb-3 d-flex justify-content-between p-3">
    <div class="">
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary">{{ __('Create') }}</a>
        <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-sm btn-outline-success">{{ __('Trash') }}</a>
    </div>
    <div class="">
        <form action="{{ route('dashboard.categories.index') }}" class="d-flex" method="get">
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
                <th>{{ __('Parent') }}</th>
                <th>{{ trans('Image') }}</th>
                <th>@lang('Created At')</th>
                <th colspan="2">{{ __('app.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_name ?? '' }}</td>
                <td>
                    <img src="/storage/{{ $category->image }}" height="100">
                <td>{{ $category->created_at }}</td>
                <td>
                    {{-- @if (Auth::user()->can('categories.update')) --}}
                    <a href="{{ route('dashboard.categories.edit', [$category->id]) }}" class="btn btn-sm btn-outline-success">{{ __('Edit') }}</a>
                    {{-- @endif --}}
                </td>
                <td>
                    {{-- @can('categories.delete') --}}
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
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
