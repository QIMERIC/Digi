<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto mx-auto">
    <li class="nav-item"><a href="{{ $character->url }}" class="nav-link">{{ $character->slug }}</a></li>
      <li class="nav-item dropdown">
          <a id="characterDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Character
          </a>

          <div class="dropdown-menu" aria-labelledby="characterDropdown">
            <a href="{{ $character->url }}" class="dropdown-item {{ set_active('character/'.$character->slug) }}">Information</a>
            <a href="{{ $character->url . '/profile' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/profile') }}">Profile</a>
            <a href="{{ $character->url . '/gallery' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/gallery') }}">Gallery</a>
            <a href="{{ $character->url . '/inventory' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/inventory') }}">Inventory</a>
            <a href="{{ $character->url . '/bank' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/bank') }}">Bank</a>
            <a href="{{ $character->url . '/level-logs' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/level-logs') }}">Level Logs</a>
          </div>
    </li>
    <li class="nav-item dropdown">
        <a id="historyDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            History
        </a>

        <div class="dropdown-menu" aria-labelledby="historyDropdown">
          <a href="{{ $character->url . '/images' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/images') }}">Images</a>
          <a href="{{ $character->url . '/change-log' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/change-log') }}">Change Log</a>
          <a href="{{ $character->url . '/ownership' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/ownership') }}">Ownership History</a>
          <a href="{{ $character->url . '/item-logs' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/item-logs') }}">Item Logs</a>
          <a href="{{ $character->url . '/currency-logs' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/currency-logs') }}">Currency Logs</a>
          <a href="{{ $character->url . '/submissions' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/submissions') }}">Submissions</a>
        </div>
    </li>
    @if(Auth::check() && (Auth::user()->id == $character->user_id || Auth::user()->hasPower('manage_characters')))
    <li class="nav-item dropdown">
        <a id="statsDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Stats
        </a>

        <div class="dropdown-menu" aria-labelledby="statsDropdown">
          <a href="{{ $character->url . '/level-area' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/level-area') }}">Level Area</a>
          <a href="{{ $character->url . '/stats-area' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/stats-area') }}">Stats Area</a>
        </div>
      </li>
      <li class="nav-item dropdown">
          <a id="settingDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Settings
          </a>

          <div class="dropdown-menu" aria-labelledby="settingDropdown">
            <a href="{{ $character->url . '/profile/edit' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/profile/edit') }}">Edit Profile</a>
            <a href="{{ $character->url . '/transfer' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/transfer') }}">Transfer</a>
            @if(Auth::user()->id == $character->user_id)
                <a href="{{ $character->url . '/approval' }}" class="dropdown-item {{ set_active('character/'.$character->slug.'/approval') }}">Update Design</a>
            @endif
          </div>
        </li>
    @endif
</ul>
</div>
