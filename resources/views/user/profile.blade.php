@extends('user.layout')

@section('profile-title') {{ $user->name }}'s Profile @endsection

@section('meta-img') {{ asset('/images/avatars/'.$user->avatar) }} @endsection

@section('profile-content')
{!! breadcrumbs(['Users' => 'users', $user->name => $user->url]) !!}


<div class="p-0 py-5 card border-0" style="margin-top: -58px;">
<div class="container px-0" style="letter-spacing: .45px; max-width: 1000px;">
  <div style="overflow:hidden;">
    <div class="p-md-4 p-3" style="background-color:#f2f2f2;border-style:solid;border-width:0 1px 4px 1px;border-color:#d6d6d6;">
      <div style="background: url(/images/headers/{{ $user->header }});
  	            background-attachment:fixed; height:170px;margin-bottom:1.5em"></div>
      <div class="row no-gutters">
      <div class="col-md-4 order-md-8 mb-md-0 mb-4">

          <div class="card d-block card-block h-100 p-2" style="border-style:solid;border-width:0 1px 4px 1px;border-color:#e8e8e8;">
            <!---------------- USE A 200 x 200 AVATAR IMAGE ----------------------------------------->
          <img src="/images/avatars/{{ $user->avatar }}"
          style="max-height: 210px; margin-top: -120px;" class="d-block mx-auto rounded-circle p-3 card border-0">

            <div class="justify-content-between">
              <div class="pr-1 text-muted" style="letter-spacing: 1px;">Alias</div>
               <div>{!! $user->displayAlias !!}</div>
            </div>
            <hr class="my-2">
            <div class="justify-content-between">
              <div class="pr-1 text-muted" style="letter-spacing: 1px;">Rank</div>
               <div>{!! $user->rank->displayName !!} {!! add_help($user->rank->parsed_description) !!}</div>
            </div>
            <hr class="my-2">
            <div class="justify-content-between">
              <div class="pr-1 text-muted" style="letter-spacing: 1px;">Joined</div>
               <div>{!! format_date($user->created_at, false) !!} ({{ $user->created_at->diffForHumans() }})</div>
            </div>
            <hr class="my-2">
            <div class="justify-content-between">
              <div class="pr-1 text-muted" style="letter-spacing: 1px;">Pronouns</div>
               <div>{!! $user->profile->pronouns !!}</div>
            </div>
            <hr class="my-2">
          </div>
      </div>
      <div class="col-md-8 pr-md-4 order-md-4">
        <div class="row no-gutters">
          <div class="col-12 mb-4">
            <div class="card d-flex p-3" style="height: 325px; overflow: auto;border-style:solid;border-width:0 1px 4px 1px;border-color:#e8e8e8;">
			      <!------- write general content here ---------->
              <div class="w-100 my-auto text-justify">
                <h1>
                  {!! $user->displayName !!}
                  <small><small><a href="{{ url('reports/new?url=') . $user->url }}"><i class="fas fa-exclamation-triangle fa-xs" data-toggle="tooltip" title="Click here to report this user." style="opacity: 50%;"></i></a></small></small>
                  @if($user->settings->is_fto)
                    <span class="badge badge-success float-right" data-toggle="tooltip" title="This user has not owned any characters from this world before.">FTO</span>
                  @endif
                </h1>
                <p>{!! $user->profile->parsed_text !!}</p>
                <p>@if($user->is_banned)
                    <div class="alert alert-danger">This user has been banned.</div>
                @endif</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </div>
</div>
</div>

@comments(['model' => $user->profile,
        'perPage' => 5
    ])
@endsection
