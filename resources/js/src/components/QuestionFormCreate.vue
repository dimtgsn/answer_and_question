<template>
  <div class="create_question">
    <h2 class="subtitle">Add a new question: </h2>
    <section class="form-section">
      <form id="form" action="" method="POST">

        <div class="form-group">
          <div class="form-input_wrapp"
               :class="{
                          'input-error': v$.question.$error,
                          'input-invalid': !v$.question.$invalid,
                        }">
            <input class="form_input"
                   type="text"
                   id="question"
                   name="question"
                   placeholder="Question"
                   v-model.trim="formData.question"
                   @change="v$.question.$touch">
            <div v-if="v$.question.$error" class="error_message">
              {{ v$.question.$errors[0].$message }}
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea class="form-textarea-sm form-input_wrapp form_input form-message"
                    id="answer"
                    name="answer"
                    :disabled="formData.question === ''"
                    placeholder="Answer"
                    v-model.trim="formData.answer"></textarea>
        </div>
        <div class="message_error" v-if="createQuestionError">{{ createQuestionError }}</div>
        <div class="send-form" >
          <div v-if="v$.question.$error || formData.question === ''" class="send-form-btn__disabled">
            Save
          </div>
          <div v-else @click.prevent="createQuestion" class="send-form-btn">
            Save
          </div>
        </div>
      </form>
    </section>
  </div>
</template>

<script setup>
import {computed, reactive, ref} from "vue";
import {helpers, required} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import axios from "axios";

const emits = defineEmits(['updateListQuestions'])

const formData = reactive({
  question: '',
  answer: '',
})
const rules = computed(() => {
  return {
    question: {
      required: helpers.withMessage('Question is required', required),
    },
  }
});
const v$ = useVuelidate(rules, formData);
const createQuestionError = ref('');

const createQuestion = () => {
  axios(`/question`, {
    method: 'POST',
    headers: {
      'content-type': 'application/json',
    },
    params: {
      title: formData.question,
      answer: formData.answer,
    },
  }).then(() => {}).catch((err) => {
      createQuestionError.value = "Server internal error. Check the correctness of the data and try again"
      console.error(err)
  }).finally(() => {
    emits("updateListQuestions")
  })
}
</script>

<style scoped>
.subtitle{
  font-size: 1.5rem;
  font-weight: 500;
  line-height: 1.75rem;
}
.form-section{
  position: relative;
  z-index: 99;
  margin-top: 2rem;
}
.form-input_wrapp{
  width: 100%;
  height: 3rem;
  background: #ffffff;
  border: 1px solid rgba(133, 143, 164, 0.5);
  border-radius: 5px;
  margin-bottom: 2rem;
}
.form-input_wrapp:focus-within{
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
  border-color: #66afe9;
  background: #FFFFFF;
}
.form-input_wrapp:hover {
  border: 1px solid rgba(133, 143, 164, 1);
}
.form_input{
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #858FA4;
  width: 100%;
  border-radius: 5px;
  padding: .75rem 1rem;
  margin-bottom: 5px;
}
.form_input:disabled{
  opacity: 0.5;
}
.form_input::placeholder {
  font-weight: 400;
  font-size: 1rem;
  line-height: 140%;
  color: #858FA4;
}
.error_message{
  font-weight: 500;
  font-size: .875rem;
  line-height: 110%;
  color: #E31235;
}
.input-error{
  border: 1px solid #E31235;
  background: #FFFFFF;
}
.input-invalid{
  background: #FFFFFF;
}
.message_error{
  color: #E31235;
  font-size: 1rem;
  margin-top: 1rem;
}
.send-form{
  margin-top: 2rem;
}
.send-form-btn,
.send-form-btn__disabled{
  width: 9rem;
  height: 3rem;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  opacity: .6;
  background: #170F49;
  color: #ffffff;
  cursor: pointer;
  transition: all .3s ease;
}
.send-form-btn:hover{
  opacity: .8;
  transition: all .3s ease;
}
.send-form-btn__disabled{
  opacity: .2;
}
.form-message {
  transition: all .3s ease;
  border: 1px solid rgba(133, 143, 164, .5);
  background: #ffffff;
}
.form-message:hover {
  border: 1px solid rgba(133, 143, 164, 1);
}
.form-message:focus-within{
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
  border-color: #66afe9;
  background: #FFFFFF;
  outline: none;
}
.form-textarea-sm{
  min-height: 5rem;
  min-width: 100%;
  max-width: 100%;
}
</style>