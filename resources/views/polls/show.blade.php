@extends('layouts.main')

@section ('content')
<section>
    <div class="container">
        <article>
            <p class="lead">{!!\App\Libraries\Common::format_topics($poll->topics)!!}</p>
            <h1 class="poll-title"><a href="/polls/{{$poll->slug}}">{{$poll->title}}</a></h1>
            <div class="row">
                <div class="col-md-6">   
                    @if (!is_null($poll->image))
                    <p><img src="/assets/img/polls/{{$poll->image}}" class="img-responsive" ></p>
                    @endif
                    <p class="text-muted">{!!nl2br($poll->description)!!}</p>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    @include ('polls.item')
                </div>
            </div>
        </article>
        @if (count($response))
        <hr>
        <div class="row">
            <div class="col-md-4"><div class="ct-chart ct-golden-section" id="chart1"></div></div>
            <div class="col-md-4"><div class="ct-chart ct-golden-section" id="chart2"></div></div>
            <div class="col-md-4"><div class="ct-chart ct-golden-section" id="chart3"></div></div>
        </div>

        <hr>
        <h2>Responses</h2>
        <div class="table-responsive">
        <table class="table table-condensed">
            <thead>
                <th>ID</th><th>User</th><th>Option</th><th>Date</th>
            </thead>
            <tbody>
            @foreach ($responses as $response)
                <tr><td>{{$response->id}}</td><td>{{$response->user->name}}</td><td>{{$response->option->text}}</td><td>{{date('j F Y', strtotime($response->created_at))}}</td></tr>
            @endforeach
            </tbody>
        </table>
        </div>
        @endif
    </div>
</section>

<script>
    // Initialize a Line chart in the container with the ID chart1
    new Chartist.Line('#chart1', {
    labels: [1, 2, 3, 4],
    series: [[100, 120, 180, 200]]
    });

    new Chartist.Bar('#chart2', 
    {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        series: [
            [5, 4, 3, 7, 5, 10, 3]
        ]
    }, 
    {
        reverseData: true,
        horizontalBars: true,
        axisY: {
            offset: 90
        }
    });

    var data = {
      series: [5, 3, 4]
    };

    var sum = function(a, b) { return a + b };

    new Chartist.Pie('#chart3', data, {
      labelInterpolationFnc: function(value) {
        return Math.round(value / data.series.reduce(sum) * 100) + '%';
      }
    });
</script>
@endsection