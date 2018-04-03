@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert" id="notification-container">
            <div class="notification notification-{{ $message['level'] }}">
                <button class="notification-close"></button>
                <div class="notification-title">{{ $message['level'] }} !</div>
                <div class="notification-message">{!! $message['message'] !!}</div>
            </div>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
