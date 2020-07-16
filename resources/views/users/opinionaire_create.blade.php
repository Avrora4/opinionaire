@extends('layouts.app')

@section('content')
<h1>Opinonaire Create</h1>

<form method="POST" action="opinionaire_confirm" id='creat_app' class='opinonaire_create' data-questions='<?= json_encode($questions)?>' >
    @csrf
    <div class="create_c">
        <p>What's questions title?</p>
        <input type='text' name='title' required class='form-control'>
    </div>
    <br>
    <br>
    <div v-for="(question, index) in questions" style="margin-bottom:5px" class="card">
        <div class="card-header">@{{index+1}}.Question</div>
            <div class="card-body">
                <p>Enter the question contents!!</p>
                <input type='text' :name='"questions["+index+"][text]"' v-model='question.text' required class='form-control'>  
                <p>Choose the question form!</p>
                <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='text' required>text</label>
                <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='number' required>number</label>
                <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='radio' required>radio</label>
                <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='checkbox' required>checkbox</label>

                <div v-if="question.type == 'radio' || question.type == 'checkbox'">
                    <ol>
                        <li v-for="(item,i) in question.items" class="form-group col-md-6">   
                            <input type='text' :name='"questions["+index+"][items]["+i+"]"' v-model='question.items[i]' required class='form-control'>
                        </li>
                    </ol>
                <button type='button' v-on:click='add_button(index)' class="btn btn-light" >ADD BUTTON</button>
            </div>
        </div>
    </div>
    <button type='button' v-on:click='add_question' class="btn btn-light" style='margin:5px 0'>ADD QUESTION</button>
          

<br>
    <div class='c_b'>
        <button type='submit' class="btn btn-info" style='margin:5px 0'>COMFIRM</button>
    </div>
</form>
@endsection

@section('page_script')
<script>
var app2 = new Vue({
    el: '#app',
    data: {
        questions:JSON.parse(document.getElementById("creat_app").dataset.questions)
    },
     methods:{
        add_question:function(){
            app2.$data.questions.push({items: [""]});
            return false;
        },
        add_button:function(index){
            app2.$data.questions[index].items.push("");
            return false;
        }
     }
});
</script>
@endsection
