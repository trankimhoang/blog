@extends('layouts.master_admin')
@section('page_title', __('Top Comment'))
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>{{ __('ID') }}</th>
            <th>{{ __('Post Name') }}</th>
            <th>{{ __('User Name') }}</th>
            <th>{{ __('Content') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
        @foreach($listTopComment as $topComment)
            <tr>
                <td>{{ $topComment->id }}</td>
                <td>{{ $topComment->post->name }}</td>
                <td>{{ $topComment->user->name }}</td>
                <td>{{ $topComment->content }}</td>
                <td>{{ $topComment->created_at }}</td>
                <td>
                    <form action="{{ route('admin.comment.destroy', $topComment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
