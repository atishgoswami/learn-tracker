@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="pull-right">
                        <a href="{{ route('note.create') }}" class="btn btn-primary">
                            Add New Note
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @foreach($notes as $note)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $note->title }}
                </div>
                <div class="panel-body">{{ $note->body }}</div>
                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <a href="{{ route('note.edit', ['note_id' => $note->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('note.delete', ['note_id' => $note->id]) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @if ($notes->count())
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="text-center">
                    {{ $notes->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
