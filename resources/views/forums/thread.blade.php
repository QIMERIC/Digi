@extends('layouts.app')

@section('title') Forum :: {{ $thread->title }} @endsection

@section('content')
{!! breadcrumbs(['Forum' => 'forum' , $thread->commentable->name => 'forum/'.$thread->commentable->id, $thread->title => 'forum/'.$thread->commentable->id.'/'.$thread->id ]) !!}

<div class="row no-gutters">

    <h1 class="col-md">
        {!! $thread->displayName !!}
        <a href="{{ url('reports/new?url=') . $thread->threadUrl }}"><i class="fas fa-exclamation-triangle" data-toggle="tooltip" title="Click here to report this thread." style="opacity: 50%;font-size:0.7em; float:right;"></i></a>
    </h1>

    @auth
        @can('reply-to-comment', $thread)
            <div class="col-md text-right">
                <button data-toggle="modal" data-target="#reply-modal-{{ $thread->getKey() }}" class="btn px-3 py-2 px-sm-4 py-sm-1  btn-faded text-uppercase"><i class="fas fa-comment"></i><span class="ml-2 d-none d-sm-inline-block">Reply to Thread</span></button>
            </div>
        @endcan
    @endauth
</div>

@inject('markdown', 'Parsedown')
@php
    $markdown->setSafeMode(true);
@endphp




<div class="mb-2 row no-gutters" style="clear:both;">
    <div class="col-md-2 text-center" style="background-image:url(https://cdn.discordapp.com/attachments/769629553311744000/818559913676111892/230.png);margin-right:1em;background-repeat:no-repeat;">
        <img class="my-2 mw-100" src="/images/avatars/{{ $thread->commenter->avatar }}" style="max-width:150px; max-height:150px; border-radius:50%;border: solid white 5px;" alt="{{ $thread->commenter->name }} Avatar">
        <div class="pb-0 mb-2 btn btn-light bg-light">
          <h5>{!! $thread->commenter->displayName !!}</h5>
        </div>
    </div>
    <div class="col-md border">
        <div class="mb-2 border-bottom p-2">
            <div class="row no-gutters justify-content-between">
                <div class="col">
                    @if($thread->type == "User-User")
                        <a href="{{ url('comment/').'/'.$thread->id }}"><i class="fas fa-link ml-1" style="opacity: 50%;"></i></a>
                    @endif
                    {!! $thread->created_at->calendar() !!}
                    @if($thread->created_at != $thread->updated_at)
                        <small><span class="text-muted border-left mx-1 px-1">Edited {!! ($thread->updated_at->calendar()) !!}</span></small>
                    @endif
                </div>
                <div class="col text-right">
                @if(Auth::check())
                    @can('reply-to-comment', $thread)
                        <a role="button" data-toggle="modal" data-target="#reply-modal-{{ $thread->getKey() }}" class="px-2 py-2 px-sm-2 py-sm-1 text-uppercase" style="cursor: pointer;"><i class="fas fa-comment"></i><span class="ml-2 d-none d-sm-inline-block">Reply</span></a>
                    @endcan
                    @can('edit-comment', $thread)
                        <a href="{!! $thread->threadUrl.'/edit' !!}" class="px-2 py-2 px-sm-2 py-sm-1 text-uppercase" style="cursor: pointer;"><i class="fas fa-edit"></i><span class="ml-2 d-none d-sm-inline-block">Edit</span></a>
                    @endcan
                    @can('delete-comment', $thread)
                        <a role="button" data-toggle="modal" data-target="#delete-modal-{{ $thread->getKey() }}" class="px-2 py-2 px-sm-2 py-sm-1 text-danger text-uppercase" style="cursor: pointer;"><i class="fas fa-minus-circle"></i><span class="ml-2 d-none d-sm-inline-block">Delete</span></a>
                    @endcan
                @endif
                </div>
            </div>
        </div>
        <div class="p-2">
            <p>{!! nl2br($thread->comment) !!}</p>
        </div>
    </div>
</div>

@include('forums._form_modals', ['comment' => $thread])



@if($replies->count())
    {!! $replies->render() !!}
    @foreach($replies as $comment)
        <div class="mb-2 row no-gutters">
          <div class="col-md-2 text-center" style="background-image:url(https://cdn.discordapp.com/attachments/769629553311744000/818559913676111892/230.png);margin-right:1em;background-repeat:no-repeat;">
              <img class="my-2 mw-100" src="/images/avatars/{{ $thread->commenter->avatar }}" style="max-width:150px; max-height:150px; border-radius:50%;border: solid white 5px;" alt="{{ $thread->commenter->name }} Avatar">
              <div class="pb-0 mb-2 btn btn-light bg-light">
                <h5>{!! $thread->commenter->displayName !!}</h5>
              </div>
          </div>
            <div class="col-md border">
                <div class="mb-2 border-bottom p-2">
                    <div class="row no-gutters justify-content-between">
                        <div class="col">
                            @if($comment->type == "User-User")
                                <a href="{{ url('comment/').'/'.$comment->id }}"><i class="fas fa-link ml-1" style="opacity: 50%;"></i></a>
                            @endif
                            {!! $comment->created_at->calendar() !!}
                            @if($comment->created_at != $comment->updated_at)
                                <small><span class="text-muted border-left mx-1 px-1">Edited {!! ($comment->updated_at->calendar()) !!}</span></small>
                            @endif
                        </div>
                        <div class="col text-right">
                        @if(Auth::check())
                            @can('reply-to-comment', $comment)
                                <a role="button" data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}" class="px-2 py-2 px-sm-2 py-sm-1 text-uppercase" style="cursor: pointer;"><i class="fas fa-comment"></i><span class="ml-2 d-none d-sm-inline-block">Reply</span></a>
                            @endcan
                            @can('edit-comment', $comment)
                                <a role="button" data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}" class="px-2 py-2 px-sm-2 py-sm-1 text-uppercase" style="cursor: pointer;"><i class="fas fa-edit"></i><span class="ml-2 d-none d-sm-inline-block">Edit</span></a>
                            @endcan
                            @can('delete-comment', $comment)
                                <a role="button" data-toggle="modal" data-target="#delete-modal-{{ $comment->getKey() }}" class="px-2 py-2 px-sm-2 py-sm-1 text-danger text-uppercase" style="cursor: pointer;"><i class="fas fa-minus-circle"></i><span class="ml-2 d-none d-sm-inline-block">Delete</span></a>
                            @endcan
                            <a href="{{ url('reports/new?url=') . $comment->url }}"><i class="fas fa-exclamation-triangle mr-2" data-toggle="tooltip" title="Click here to report this comment." style="opacity: 50%;"></i></a>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="p-2">
                    <p>{!! nl2br($markdown->line($comment->comment)) !!}</p>
                </div>

                @include('forums._form_modals', ['comment' => $comment])
            </div>
        </div>
    @endforeach
    {!! $replies->render() !!}
@else
    <div class="text-center mb-2"><small>No Replies Yet</small></div>
@endif

@can('reply-to-comment', $thread)
    <div class="card p-3">
        <form method="POST" action="{{ route('comments.reply', $thread->getKey()) }}">
            @csrf
            <h5 class="modal-title">Reply to Thread</h5>
            <div class="form-group mb-0">
                <label for="message">Enter your message here:</label>
                <textarea required class="form-control" name="message" rows="3"></textarea>
                <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown cheatsheet.</a></small>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-sm px-md-4 btn-outline-secondary text-uppercase" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm px-md-4 btn-outline-success text-uppercase">Reply</button>
            </div>
        </form>
    </div>
@endcan

@endsection
