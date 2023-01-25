@extends('layouts.dashboard')

@section('title', 'Categories Trash')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{route('dashboard.categories.index')}}">{{ __('Categories') }}</a></li>
    <li class="breadcrumb-item active">Trash</li>

@endsection

@section('content')

<div class="table-toolbar mb-3  p-3">
    <a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-outline-success">Back</a>
</div>

<div class="table-responsive  p-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Deleted At</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if ($category->image)
                    <img src="/storage/{{ $category->image }}" height="100">
                    @else
                    <img src="{{ asset('images/blank.png') }}" height="100">
                    @endif
                </td>
                <td>{{ $category->deleted_at }}</td>
                <td>
                    <form action="{{ route('dashboard.categories.restore', $category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-outline-success">Restore</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
