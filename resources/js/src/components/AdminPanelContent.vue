<template>
  <div class="questions">
    <h2 class="questions_title subtitle">A list of questions: </h2>
    <ul class="question_list" v-if="!pending">
      <li class="question" v-for="q in questions" :key="q">
        <div class="wrap">
          <h3 class="question_title">{{ q.title }}</h3>
          <div class="question_actions">
            <span @click="deleteTheQuestion(q.id)" class="delete_question">
              <svg width="28px" height="28px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#bb1616"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M8 3.994C8 2.893 8.895 2 10 2s2 .893 2 1.994h4c.552 0 1 .446 1 .997 0 .55-.448.997-1 .997H4c-.552 0-1-.447-1-.997s.448-.997 1-.997h4zM5 14.508V8h2v6.508a.5.5 0 00.5.498H9V8h2v7.006h1.5a.5.5 0 00.5-.498V8h2v6.508A2.496 2.496 0 0112.5 17h-5C6.12 17 5 15.884 5 14.508z" fill="#bb1616"></path></g></svg>
            </span>
            <span @click="getCurrentQuestionUpdate(q)" class="change_question">
              <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17.0671 2.27157C17.5 2.09228 17.9639 2 18.4324 2C18.9009 2 19.3648 2.09228 19.7977 2.27157C20.2305 2.45086 20.6238 2.71365 20.9551 3.04493C21.2864 3.37621 21.5492 3.7695 21.7285 4.20235C21.9077 4.63519 22 5.09911 22 5.56761C22 6.03611 21.9077 6.50003 21.7285 6.93288C21.5492 7.36572 21.2864 7.75901 20.9551 8.09029L20.4369 8.60845L15.3916 3.56308L15.9097 3.04493C16.241 2.71365 16.6343 2.45086 17.0671 2.27157Z" fill="#170F49"></path> <path d="M13.9774 4.9773L3.6546 15.3001C3.53154 15.4231 3.44273 15.5762 3.39694 15.7441L2.03526 20.7369C1.94084 21.0831 2.03917 21.4534 2.29292 21.7071C2.54667 21.9609 2.91693 22.0592 3.26314 21.9648L8.25597 20.6031C8.42387 20.5573 8.57691 20.4685 8.69996 20.3454L19.0227 10.0227L13.9774 4.9773Z" fill="#170F49"></path> </g></svg>
            </span>
          </div>
        </div>
      </li>
    </ul>
    <div style="margin-top: 1rem;" v-else>Loading...</div>
  </div>
  <div class="line"></div>
  <QuestionFormCreate v-if="!questionFormUpdate" @updateListQuestions="getQuestions()"/>
  <QuestionFormUpdate
      v-else-if="currentUpdateQuestion.id !== null && currentUpdateQuestion.title !== ''"
      :question_id="currentUpdateQuestion.id"
      :question_title="currentUpdateQuestion.title"
      :question_answer="currentUpdateQuestion.answer" @updateListQuestions="getQuestions();questionFormUpdate=false"/>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";
import QuestionFormCreate from "./QuestionFormCreate.vue"
import QuestionFormUpdate from "./QuestionFormUpdate.vue"

const questions = ref([])
const pending = ref(true)

const currentUpdateQuestion = ref({
  id: null,
  title: '',
  answer: '',
})

const questionFormUpdate = ref(false)

const getQuestions = () => {
  pending.value = true;
  axios.get("/questions").then(res => {
    questions.value = res.data
  }).catch((err) => {
    console.error(err)
  }).finally(() => {
    pending.value = false;
  })
}

getQuestions()

const deleteTheQuestion = (question_id) => {
  pending.value = true
  axios(`/api/question/${question_id}`, {
    method: 'DELETE',
    headers: {
      'content-type': 'application/json',
    }
  }).then((res) => {
    getQuestions()
    console.log(res)
  }).catch((err) => {
    console.error(err)
  }).finally(() => {
    pending.value = false;
  })
}
const getCurrentQuestionUpdate = (question) => {
  currentUpdateQuestion.value = {
    id: question.id,
    title: question.title,
    answer: question.answer,
  }
  questionFormUpdate.value = true
}
</script>

<style scoped>
.question_title{
  font-size: 1.225rem;
  font-weight: 500;
  line-height: 1.75rem;
  display: inline-block;
}
.question{
  padding-top: 1rem;
  list-style: circle;
  font-size: 1.5rem;
}
.question_list{
  list-style: circle;
  padding-left: 2rem;
}
.wrap{
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.question_actions{
  display: flex;
  align-items: start;
}
.delete_question{
  color: red;
  font-weight: 600;
  font-size: 1.5rem;
  cursor: pointer;
  transition: all .3s ease;
}
.delete_question:hover{
  transition: all .3s ease;
  opacity: .6;
}
.change_question{
  color: #4A3AFF;
  font-weight: 600;
  /*font-size: 1rem;*/
  margin-left: 5rem;
  cursor: pointer;
  transition: all .3s ease;
}
.change_question:hover{
  transition: all .3s ease;
  opacity: .6;
}
.questions{
  padding: 1.5rem 0;
}
.subtitle{
  font-size: 1.5rem;
  font-weight: 500;
  line-height: 1.75rem;
}
.line{
  height: 1px;
  margin: .5rem 0 2rem 0;
  width: 100%;
  background: var(--question-body-color);
}
</style>