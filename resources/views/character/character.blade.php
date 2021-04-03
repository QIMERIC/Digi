@extends('character.layout', ['isMyo' => $character->is_myo_slot])

@section('profile-title') {{ $character->fullName }} @endsection

@section('meta-img') {{ $character->image->thumbnailUrl }} @endsection

@section('profile-content')
@if($character->is_myo_slot)
{!! breadcrumbs(['MYO Slot Masterlist' => 'myos', $character->fullName => $character->url]) !!}
@else
{!! breadcrumbs([($character->category->masterlist_sub_id ? $character->category->sublist->name.' Masterlist' : 'Character masterlist') => ($character->category->masterlist_sub_id ? 'sublist/'.$character->category->sublist->key : 'masterlist' ), $character->fullName => $character->url]) !!}
@endif

@include('character._header', ['character' => $character])

<div class="row">
    <div class="col text-center">
      <a href="{{ $character->image->canViewFull(Auth::check() ? Auth::user() : null) && file_exists( public_path($character->image->imageDirectory.'/'.$character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}" data-lightbox="entry" data-title="{{ $character->fullName }}">
        <img src="{{ $character->image->canViewFull(Auth::check() ? Auth::user() : null) && file_exists( public_path($character->image->imageDirectory.'/'.$character->image->fullsizeFileName)) ? $character->image->fullsizeUrl : $character->image->imageUrl }}" class="image" /></a>
    </div>

    <div class="col">
        <div class="p-2" style="clip-path: polygon(5% 0, 100% 0%, 100% 100%, 0% 100%);text-indent:2rem;background-color:#f2f2f2;">
          <div class="character-masterlist-categories">
              @if(!$character->is_myo_slot)
                  {!! $character->category->displayName !!} / {!! $character->image->species->displayName !!} / {!! $character->image->rarity->displayName !!}
              @else
                  MYO Slot @if($character->image->species_id) / {!! $character->image->species->displayName !!}@endif @if($character->image->rarity_id) / {!! $character->image->rarity->displayName !!}@endif
              @endif
          </div>
          <h1 class="mb-0">
              @if($character->is_visible && Auth::check() && $character->user_id != Auth::user()->id)
                  <?php $bookmark = Auth::user()->hasBookmarked($character); ?>
                  <a href="#" class="btn btn-outline-info float-right bookmark-button ml-2" data-id="{{ $bookmark ? $bookmark->id : 0 }}" data-character-id="{{ $character->id }}"><i class="fas fa-bookmark"></i> {{ $bookmark ? 'Edit Bookmark' : 'Bookmark' }}</a>
              @endif
              @if(!$character->is_visible) <i class="fas fa-eye-slash"></i> @endif {!! $character->displayName !!}
          </h1>
          <div class="mb-0 pb-0">
              Uploaded {!! pretty_date($character->image->created_at) !!}
          </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent
    @include('character._image_js', ['character' => $character])
@endsection
