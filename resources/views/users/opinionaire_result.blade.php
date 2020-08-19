@extends('layouts.app')
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
</head>

@section('content')
<body>
    <div class="title">
        <h1>{{$opinionaire->title}}</h1>
    </div>
    <div id="data_opinionaire" data-opinionaire="{{json_encode(compact('opinionaire','result'))}}">
        @foreach ($questions as $index => $question)
        <div class="card-header">
            <h2>{{$index+1}}. {{$question['text']}}</h2>
            <div class="card-body">
                <ul>
                    @if ($question['type'] =='text' || $question['type'] =='number')
                        @foreach (array_column($result,$index) as $a)
                            <li>{{$a}}</li>
                        @endforeach
                    @else
                        <canvas id="select{{$index}}"></canvas>
                    @endif
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div class='to_mypage'>
        <a href="{{route('welcome')}}"><button class="btn btn-dark">HOME</button></a>
    </div>
</body>
@endsection


@section('page_script')
<script>
    var data = document.getElementById("data_opinionaire");
    var usedata = JSON.parse(data.dataset.opinionaire);
    var questions = JSON.parse(usedata.opinionaire.questions);
    questions.forEach((q,i) => {
        if(q.type != "radio" && q.type != "checkbox" )
        {
            return ;
        }
        var counter = [];
        usedata.result.forEach(
            (a) => a[i].forEach((b) => {
                if(counter[b] == null ) {
                    counter[b] = 0 
                } 
                counter[b]++
            }));
        var ctx = document.getElementById("select"+i).getContext("2d"); 
        var RatioBar = new Chart( ctx, {
            type: 'bar',  //graphtype
            data: {                     //data
                labels: questions[i].items,
                datasets: [{
                    backgroundColor: '#00ffff',
                    data: counter,  
                    }]
            },
            options: {
                legend: {                          //凡例設定
                display: false                 //表示設定
                },
                title: {
                    display: true,
                    text: 'Statistics'
                },
                scales: {
                    yAxes: [{
                            display: true,
                            ticks: {
                                min: 0,                            
                                },
                            }]
                    }
                }   
            },
        )    
    })
</script>
@endsection