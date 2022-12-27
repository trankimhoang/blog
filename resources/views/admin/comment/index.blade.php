@extends('layouts.master_admin')
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
        @foreach($listComment as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->post->name }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>
                    <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>{{ $listComment->render() }}</div>
@endsection
