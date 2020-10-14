@if( $errors->any())
<div class="alert alert-{{ $type }}" role="alert">
    {{ $slot }}
    <ul>
        @foreach($errors->all() as $e)
            <li>{{$e}}</li>
        @endforeach
    </ul>
</div>
@endif