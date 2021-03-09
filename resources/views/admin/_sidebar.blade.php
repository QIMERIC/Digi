<ul class="navbar-nav mr-auto mx-auto">
    <li class="nav-item"><a href="{{ url('admin') }}" class="nav-link">Admin Home</a></li>

    @foreach(Config::get('lorekeeper.admin_sidebar') as $key => $section)
        @if(Auth::user()->isAdmin || Auth::user()->hasPower($section['power']))
            <li class="nav-item dropdown">
                <a id="{{ $key }}Dropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ str_replace(' ', '', $key) }}</a>

                <div class="dropdown-menu" aria-labelledby="{{ $key }}Dropdown">
                @foreach($section['links'] as $item)
                    <a href="{{ url($item['url']) }}" class="dropdown-item {{ set_active($item['url'] . '*') }}">{{ $item['name'] }}</a>
                @endforeach
                </div>
            </li>
        @endif
    @endforeach

</ul>
