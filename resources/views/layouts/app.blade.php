@extends('layouts.header')

@section('content')
<div id="app">

    <div class="container">
        <ul class="nav nav-tabs">

            @foreach (Session::get('tabs') as $tab)
                <li class="active nav-item">
                    <form method="POST" action="{{ route('opentab', $loop->index)}}">
                        @csrf
                        <button type="submit" class="nav-link">
                            {{$tab['name']}}
                        </button>
                    </form>
                    @if ($tab['name'] != 'Home')
                        <form method="POST" action="{{ route('closetab', $loop->index)}}">
                            @csrf
                            <button class="float-right close" type="submit"> &times;</button>
                        </form>
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
