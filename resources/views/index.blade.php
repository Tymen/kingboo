@extends("Layouts.index")
@section("browsertitle")
    Welcome
@endsection
@section("content")
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
    <div class="gridmain">
        <div class="ghostdoor-start-explain">
            <div class="ghostdoor-start-explain-title">
                <h1>Storyline</h1>
            </div>
            <div class="ghostdoor-start-explain-story">
                <p>It's Halloween and you're dressed up and you are going along every house in your street with your brother to collect candies but suddenly out of nowhere your brother runs away  towards a deserted castle so you ran after him in to the deserted castle.
                    but once you're in the castle you can't find your brother anymore. It's very dark but there are a few candles and you see 5 doors which door do you choose ...</p>
            </div>
        </div>
        <div class="ghostdoor-start-mainstart">
            <div class="ghostdoor-start-mainstart-img">
                <img id="kingboo" src="/img/Kingboo.png">
            </div>
            <div class="ghostdoor-start-mainstart-startbtn">
            <a href="/play">Start</a>
            </div>
        </div>
        <div class="ghostdoor-start-highscore">
            <div class="ghostdoor-start-highscore-title">
                <h1>Highscore</h1>
            </div>
            <div class="ghostdoor-start-highscore-table">
                <table>
                    <tr>
                        <th>Rank</th>
                        <th>User</th>
                        <th>Score</th>
                    </tr>
                    @foreach($allscores as $game)
                        <tr>
                            <th>{{$tableRank}}</th>
                            <th>{{$game->player}}</th>
                            <th>{{$game->score}}</th>
                            <!--{{$tableRank = $tableRank + 1}}-->
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Developed by: <a href="https://vunzigeberen.vysix.nl">Vunzige Beren</a></p>
    </div>
@endsection