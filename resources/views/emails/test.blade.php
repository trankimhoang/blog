<h2>Hello {{ $userSendMail->name }}</h2>
<p>{{ __('Click to view post!!') }}  </p>
<img src="{{ $post->getImage() }}" alt="">
<a href="{{ route('web.detail', $post->id) }}">{{ $post->name }}</a>
