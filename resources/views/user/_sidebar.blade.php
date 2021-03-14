        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ $user->url }}">{{ Illuminate\Support\Str::limit($user->name, 15, $end='...') }}</a>
                </li>
                    <li class="nav-item dropdown">
                        <a id="galleryDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Gallery
                        </a>

                        <div class="dropdown-menu" aria-labelledby="galleryDropdown">
                            <a class="dropdown-item" href="{{ $user->url.'/gallery' }}" class="{{ set_active('user/'.$user->name.'/gallery*') }}">
                                Gallery
                            </a>
                            <a class="dropdown-item" href="{{ $user->url.'/favorites' }}" class="{{ set_active('user/'.$user->name.'/favorites*') }}">
                                Favorites
                            </a>
                            <a class="dropdown-item" href="{{ $user->url.'/favorites/own-characters' }}" class="{{ set_active('user/'.$user->name.'/favorites/own-characters*') }}">
                                Own Character Favorites
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            User
                        </a>

                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ $user->url.'/characters' }}" class="{{ set_active('user/'.$user->name.'/characters*') }}">
                                Characters
                            </a>
                            @if(isset($sublists) && $sublists->count() > 0)
                                    @foreach($sublists as $sublist)
                                    <a class="dropdown-item" href="{{ $user->url.'/sublist/'.$sublist->key }}" class="{{ set_active('user/'.$user->name.'/sublist/'.$sublist->key) }}">{{ $sublist->name }}</a>
                                    @endforeach
                            @endif
                            <a class="dropdown-item" href="{{ $user->url.'/myos' }}" class="{{ set_active('user/'.$user->name.'/myos*') }}">MYO Slots</a>
                            <a class="dropdown-item" href="{{ $user->url.'/inventory' }}" class="{{ set_active('user/'.$user->name.'/inventory*') }}">Inventory</a>
                            <a class="dropdown-item" href="{{ $user->url.'/bank' }}" class="{{ set_active('user/'.$user->name.'/bank*') }}">Bank</a>
                            <a href="{{ $user->url.'/level' }}" class="dropdown-item {{ set_active('user/'.$user->name.'/level*') }}">Level-Logs</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="historyDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            History
                        </a>

                        <div class="dropdown-menu" aria-labelledby="historyDropdown">
                          <a class="dropdown-item" href="{{ $user->url.'/ownership' }}" class="{{ $user->url.'/ownership*' }}">Ownership History</a>
                          <a class="dropdown-item" href="{{ $user->url.'/item-logs' }}" class="{{ $user->url.'/currency-logs*' }}">Item Logs</a>
                          <a class="dropdown-item" href="{{ $user->url.'/currency-logs' }}" class="{{ set_active($user->url.'/currency-logs*') }}">Currency Logs</a>
                          <a class="dropdown-item" href="{{ $user->url.'/submissions' }}" class="{{ set_active($user->url.'/submissions*') }}">Submimissions</a>
                        </div>
                    </li>

                    <li class="nav-link {{ $user->url.'/forum*' }}" href="{{ $user->url.'/forum' }}">Forum Posts</li>

                    @if(Auth::check() && Auth::user()->hasPower('edit_user_info') && Auth::user()->canEditRank($user->rank))
                        <li class="nav-item">
                            <a href="{{ $user->adminUrl }}" class="nav-link">Edit User</a>
                        </li>
                    @endif
            </ul>
        </div>
