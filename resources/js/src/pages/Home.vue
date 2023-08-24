<template>
  <section class="section-questions">
    <div class="question" v-if="!pending" ref="question" @click="openQuestion(question[id])" v-for="(q, id) in questions" :key="id">
      <QuestionAnswer :title="q.title" :answer="q.answer" />
    </div>
    <div v-else>
      <div class="container">
        Loading...
      </div>
    </div>
  </section>
</template>

<script setup>
import QuestionAnswer from "../components/QuestionAnswer.vue";
import {onMounted, ref} from "vue";
import axios from "axios";

const question = ref(null)
const questions = ref([])
const pending = ref(true)

onMounted(() => {
  getQuestions()
})

const getQuestions = () => {
  axios.get("/questions").then(res => {
    questions.value = res.data
  }).catch((err) => {
    console.error(err)
  }).finally(() => {
    pending.value = false;
  })
}

const openQuestion = (question) => {
  const answer = question.querySelector("#answer");
  const arrowSvg = question.querySelector(".arrow_svg");
  const arrowBtn = question.querySelector(".arrow_btn");
  const questionBody = question.querySelector(".question_body");
  arrowSvg.classList.toggle("arrow_svg__active");
  arrowBtn.classList.toggle("arrow_btn__active");
  questionBody.classList.toggle("question_body__active");
  answer.classList.toggle("question_answer__active");
};
</script>

<style scoped>
.section-questions{
  width: 100%;
}
.question{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 1.8rem;
  transition: all .3s ease;
}
.question:last-child{
  margin-bottom: 0;
}
</style>
