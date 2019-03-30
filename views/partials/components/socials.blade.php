<ul>
    @foreach(['facebook' => 'fa-facebook-f', 'instagram'=>'fa-instagram', 'twitter'=>'fa-twitter', 'google'=>'fa-google-plus', 'whatsapp'=>'fa-whatsapp', 'linkedin'=>'fa-linkedin', 'youtube'=>'fa-youtube-play'] as $sk => $sv)
        @if(setting('theme::'.$sk) && $sk == 'whatsapp')
            <li>
                <a rel="nofollow" href="whatsapp:{{ setting('theme::'.$sk) }}"><i class="fa {{ $sv }} {{ $iconClass ?? '' }}"></i></a>
            </li>
        @elseif(setting('theme::'.$sk))
            <li>
                <a rel="nofollow" target="_blank" href="{{ setting('theme::'.$sk) }}"><i class="fa {{ $sv }} {{ $iconClass ?? '' }}"></i></a>
            </li>
        @endif
    @endforeach
</ul>
