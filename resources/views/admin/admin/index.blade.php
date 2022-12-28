@extends('layouts.master_admin')
@section('content')
    <a href="{{ route('admin.admin.create') }}" class="btn btn-primary mb-2">{{ __('Add Admin') }}</a>
    <table class="table table-bordered">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Admin Name') }}</th>
            <th>{{ __('Email') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        @foreach($listAdmin as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('admin.admin.edit', $admin->id) }}" class="btn btn-dark mb-2">{{ __('Edit/Detail') }}</a>
                    <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
