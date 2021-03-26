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
          style="max-height: 210px; margin-top: -120px;" class="d-block rounded-circle p-3 card border-0">

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
            <a href="{{ $user->url.'/inventory' }}" class="btn btn-grad btn-fancy" title="testing">a</a>
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
                <p>@if($user->is_banned)
                    <div class="alert alert-danger">This user has been banned.</div>
                @endif</p>
                <p>{!! $user->profile->parsed_text !!}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <h2>
    <a href="{{ $user->url.'/characters' }}">Characters</a>
    @if(isset($sublists) && $sublists->count() > 0)
        @foreach($sublists as $sublist)
        / <a href="{{ $user->url.'/sublist/'.$sublist->key }}">{{ $sublist->name }}</a>
        @endforeach
    @endif
</h2>

<div class="row no-gutters">
  <div class="col">
    @foreach($characters->take(4)->get()->chunk(4) as $chunk)
      <div class="row mb-4">
        @foreach($chunk as $character)
            <div class="col-md-3 col-6 text-center">
                <div>
                    <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" /></a>
                </div>
                <div class="mt-1">
                    <a href="{{ $character->url }}" class="h5 mb-0"> @if(!$character->is_visible) <i class="fas fa-eye-slash"></i> @endif {{ $character->fullName }}</a>
                </div>
            </div>
        @endforeach
      </div>
    @endforeach
      <div class="text-right"><a href="{{ $user->url.'/characters' }}">View all...</a></div>
  </div>

  <div class="col-3">
    <a href="{{ $user->url.'/inventory' }}" class="btn btn-primary w-100 mb-2">Inventory</a>
    <a href="{{ $user->url.'/bank' }}" class="btn btn-primary w-100 mb-2">Bank</a>
  </div>

    </div>
  </div>
</div>
</div>

<br><br>

@comments(['model' => $user->profile,
        'perPage' => 5
    ])
@endsection

<script>
    (function($){
        $(document).ready(function(){
            $("[title]").style_my_tooltips();
        });
    })(jQuery);
</script>
