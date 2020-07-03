<h1>{{$title}}</h1>
<div> 
    @foreach ($questions as $index => $question)
        <h2>{{$index+1}}. {{$question['text']}}</h2>
        @if ($question['type'] =='text')
            <input type='text' name='{{"answers[{$index}]"}}'>
        @elseif ($question['type'] =='number')
            <input type='number' name='{{"answers[{$index}]"}}'>
        @elseif ($question['type'] =='radio')
            @foreach ($question['items'] as $i => $item)
                <label><input type='radio' name='{{"answers[{$index}]"}}' value='{{$i}}'> {{$item}}</label>
            @endforeach
        @elseif ($question['type'] =='checkbox')
            @foreach ($question['items'] as $i => $item)
            <label><input type='checbox' name='{{"answers[{$index}]"}}' value='{{$i}}'> {{$item}}</label>
            @endforeach
        @endif
    @endforeach
</div>

<form action='question_save' method='POST'>
    @csrf
    <input type='hidden' name='title' value='{{$title}}'>
    @foreach ($questions as $index => $question)
    <input type='hidden' name='{{"questions[{$index}][type]"}}' value='{{$question["type"]}}'>
        @if ($question['type'] =='radio' || $question['type'] =='checkbox')
        @foreach ($question['items'] as $i => $item)
            <input type='hidden' name='{{"questions[{$index}][items][{$i}]"}}' value='{{$item}}'>
        @endforeach
        @endif
    @endforeach
<button type='submit'>SAVE</button>
</form>