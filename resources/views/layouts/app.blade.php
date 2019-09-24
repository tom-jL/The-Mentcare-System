@extends('layouts.header')

@section('content')
<div id="app">

    <div class="container">
        <ul class="nav nav-tabs justify-content-center">

            @foreach (Session::get('tabs') as $tab)
                <li class="active nav-link">
                    <form method="POST" style="display: none;" id="opentab{{$loop->index}}" action="{{ route('opentab', $loop->index)}}">
                        @csrf
                    </form>
                    <form method="POST" style="display: none;" id="closetab{{$loop->index}}" action="{{ route('closetab', $loop->index)}}">
                        @csrf
                    </form>
                    <a class="" href="#" onclick="event.preventDefault(); document.getElementById('opentab{{$loop->index}}').submit();">{{$tab['name']}}</a>
                    @if ($tab['name'] != 'Home')
                        <a class="" href="#" onclick="event.preventDefault(); document.getElementById('closetab{{$loop->index}}').submit();">&times;</a>

                    @endif
                </li>
            @endforeach
        </ul>
    </div>


    <main class="py-4">
        @yield('page')
    </main>

</div>
@endsection
