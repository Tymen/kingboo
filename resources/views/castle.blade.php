@extends("Layouts.index")
@section("browsertitle")
    In the castle
@endsection
<div class="nav">
    <nav>
        <div>
            <img src="/img/Kingboo.png" class="kingbooicon">
        </div>
        <div>
            <h1>King Boo's Castle</h1>
        </div>
    </nav>
</div>
<div class="ghostdoor-game">
    @if($gameOver == false)
        <div class="ghostdoor-game-main">
            <h1 class="level-size">Level: {{$score}}</h1>
            @if($score == 0)
                <h1>You are in the first room I think there is 1 ghost hidden behind one of the 5 doors</h1>
            @elseif($newRoom)
                <h1>{{$newRoom}}</h1>
            @else
            @endif
            @if($score == 5)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 3 ghost's hidden behind the 5 doors</h1>
            @endif
            @if($score == 10)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 3 ghost's hidden behind the 4 doors</h1>
            @endif
            @if($score == 15)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 2 ghost's hidden behind the 3 doors</h1>
            @endif
            @if ($score == 20)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 2 ghost's hidden behind the 3 doors</h1>
            @endif
            @if ($score == 25)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 2 ghost's hidden behind the 4 doors</h1>
            @endif
            @if($score == 30)
                <img src="/img/Kingboo.png" width="150">
                <h1>Oh no! I can hear more ghost's I think there are 3 ghost's hidden behind the 5 doors</h1>
            @endif
            <pre>

            </pre>
            <form method="post" action="/play">
                @csrf
                <div class="ghostdoor-game-doors">
                    <button type="submit" name="getal" value="1"><img src="/img/door1.png" alt="Door1"></button>
                    <button type="submit" name="getal" value="2"><img src="/img/door2.png" alt="Door1"></button>
                    @if($score > 15)
                    @else
                        <button type="submit" name="getal" value="3"><img src="/img/door3.png" alt="Door1"></button>
                    @endif
                    @if ($score > 19)
                        <button type="submit" name="getal" value="3"><img src="/img/door3.png" alt="Door1"></button>
                    @endif
                    @if($score > 10)
                    @else
                        <button type="submit" name="getal" value="4"><img src="/img/door4.png" alt="Door1"></button>
                    @endif
                    @if ($score > 24)
                        <button type="submit" name="getal" value="4"><img src="/img/door4.png" alt="Door1"></button>
                    @endif
                    @if($score > 5)
                    @else
                        <button type="submit" name="getal" value="5"><img src="/img/door5.png" alt="Door1"></button>
                    @endif
                    @if($score > 29)
                        <button type="submit" name="getal" value="5"><img src="/img/door5.png" alt="Door1"></button>
                    @endif
                </div>
                <div class="ghostdoor-game-reset">
                    <input type="submit" value="reset" name="reset">
                </div>
            </form>
        </div>
    @else
        <div class="ghostdoor-gameover">
            <div class="ghostdoor-gameover-text">
                <img src="/img/Kingboo.png" width="350">
                <h1>Game over!</h1>
                <p>Level: {{$score}}</p>
                <p>Save your score!</p>
            </div>
            <form method="post" action="/">
                @csrf
                <div class="gameover-user">
                    <input type="text" placeholder="Username" name="name">
                </div>
                <div class="ghostdoor-gameover-btn">
                    <input type="submit" value="Send">
                </div>
            </form>
        </div>
    @endif
</div>