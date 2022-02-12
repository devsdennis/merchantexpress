 <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

     @if ($errors->any())
        <div class='flash alert-danger'>
            @foreach ( $errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif