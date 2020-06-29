@extends('layouts.app')
@section('content')
<h1>Opinonaire Create</h1>

<form method="POST" action="opinionaire_comfirm" id='app' data-questions='<?= json_encode($questions)?>' >
    <div class="create_c">
        <p>What's questions title?</p>
        <input type='text' id='q_name' required>
    </div>
    <br>
    <br>
    <div v-for="(question, index) in questions" >
        <p>Enter the question contents!!</p>
        <input type='text' :name='"questions["+index+"][text]"' v-model='question.text' required>
        <br>   
        <p>Choose the question form!</p>
        <input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='text' required>text
        <input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='number' required>number
        <input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='radio' required>radio
        <input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='checkbox' required>checkbox
    </div>
    <button type='button' v-on:click='add_question'>Add queston</button>
          

<br>
    <div class='c_b'>
        <button type='submit'>COMFIRM</button>
    </div>
</form>

<script>
var app2 = new Vue({
    el: '#app',
    data: {
        questions:JSON.parse(document.getElementById("app").dataset.questions)
    },
     methods:{
        add_question:function(){
            app2.$data.questions.push({});
            return false;
        }
     }
})
</script>
@endsection