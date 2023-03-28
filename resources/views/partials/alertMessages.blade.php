@if ($msg = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $msg }}</strong>
    </div>

    @elseif ($deleteMsg = Session::get('delete'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $deleteMsg }}</strong>
    </div>
    @elseif (Session::get('faild'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ Session::get('faild') }}</strong>
    </div>
    @endif

    <!-- @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>
        @endif  -->