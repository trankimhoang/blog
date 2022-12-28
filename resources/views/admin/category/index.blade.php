@extends('layouts.master_admin')
@section('page_title', __('List Category'))
@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-2">{{ __('Add Category') }}</a>
    <table class="table table-bordered">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name Category') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        @foreach($listCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-dark mb-2">{{ __('Edit/Detail') }}</a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    <div>{{ $listCategory->render() }}</div>
@endsection
