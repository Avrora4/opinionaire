<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<h1>Opinonaire Create</h1>

<form method="POST" action="opinionaire_confirm" id='app' data-questions='<?= json_encode($questions)?>' >
    @csrf
    <div class="create_c">
        <p>What's questions title?</p>
        <input type='text' name='title' required>
    </div>
    <br>
    <br>
    <div v-for="(question, index) in questions" >
        <p>Enter the question contents!!</p>
        <input type='text' :name='"questions["+index+"][text]"' v-model='question.text' required>  
        <p>Choose the question form!</p>
        <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='text' required>text</label>
        <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='number' required>number</label>
        <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='radio' required>radio</label>
        <label><input type='radio' :name='"questions["+index+"][type]"' v-model='question.type' value='checkbox' required>checkbox</label>

        <div v-if="question.type == 'radio' || question.type == 'checkbox'">
            <ol>
                <li v-for="(item,i) in question.items">   
                    <input type='text' :name='"questions["+index+"][items]["+i+"]"' v-model='question.items[i]' required>
                </li>
            </ol>
            <button type='button' v-on:click='add_button(index)'>ADD BUTTON</button>
        </div>

    </div>
    <button type='button' v-on:click='add_question'>ADD QUESTION</button>
          

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