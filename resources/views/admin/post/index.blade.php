@extends('layouts.master_admin')
@section('content')
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-2">{{ __('Add Post') }}</a>
    <table class="table table-bordered">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name Post') }}</th>
            <th>{{ __('Admin Name') }}</th>
            <th>{{ __('Name Category') }}</th>
            <th>{{ __('View') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        @foreach($listPost as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->admin->name }}</td>
                <td>{{ $post->category->name ?? '' }}</td>
                <td>{{ $post->view }}</td>
                <td>
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-dark mb-2">{{ __('Edit') }}</a>

                    <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div>{{ $listPost->render() }}</div>
@endsection
