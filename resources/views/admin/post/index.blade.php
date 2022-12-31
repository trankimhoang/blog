@extends('layouts.master_admin')
@section('content')
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-2">{{ __('Add Post') }}</a>

    <form action="{{ route('admin.post.delete_all') }}" id="form_delete_all" method="post">
        @csrf
        <button class="btn btn-danger mb-2" type="submit">{{ __('Delete') }}</button>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Name Post') }}</th>
            <th>{{ __('Admin Name') }}</th>
            <th>{{ __('Name Category') }}</th>
            <th>{{ __('Image') }}</th>
            <th>{{ __('View') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        @foreach($listPost as $post)
            <tr>
                <td>
                    <input type="checkbox" name="list_post_delete[{{ $post->id }}]" form="form_delete_all" value="1">
                    {{ $post->id }}
                </td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->admin->name }}</td>
                <td>{{ $post->category->name ?? '' }}</td>
                <td>
                    <img src="{{ $post->getImage() }}" alt="" width="128px">
                </td>
                <td>{{ $post->view }}</td>
                <td>
                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-dark mb-2">{{ __('Edit/Detail') }}</a>

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
