<template>
  <div class="question_body" :style="`padding: ${topIndent}px 0 ${bottomIndent}px 0`">
    <div class="container question_container">
      <div class="question_content">
        <h2 class="question_title">{{ props.title }}</h2>
        <p id="answer" class="question_answer">{{ props.answer ?? "Unfortunately, there isn't answer to this question yet." }}</p>
      </div>
      <div class="question_arrow">
        <QuestionArrow />
      </div>
    </div>
  </div>
</template>

<script setup>
import QuestionArrow from "./QuestionArrow.vue";
import { useQuestionModuleStore } from "../stores/QuestionModuleStore.js";

const topIndent = useQuestionModuleStore().getTopIndent().value !== "" ?
                  parseInt(useQuestionModuleStore().getTopIndent().value) : 47
const bottomIndent = useQuestionModuleStore().getBottomIndent().value !== "" ?
                     parseInt(useQuestionModuleStore().getBottomIndent().value) : 47

const props = defineProps({
  title: String,
  answer: String,
})
</script>

<style scoped>
.question_body{
  width: 88%;
  cursor: pointer;
  border-radius: 1.125rem;
  background: #ffffff;
  border: 2px solid transparent;
  box-shadow: 0 5px 16px 0 rgba(8, 15, 52, 0.06);
  transition: all .3s linear;
}
.question_body__active{
  border: 2px solid var(--btn-color, #4A3AFF);
  transition: all .3s linear;
}
.question_container{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.question_content{
  flex: 80% 0 1;
  padding-right: 1rem;
}
.question_arrow{
  flex: 10% 0 0;
  text-align: -webkit-right;
  align-self: start;
}
.question_title{
  font-size: 1.375rem;
  font-weight: 500;
  line-height: 1.75rem;
}
.question_answer{
  color: var(--question-body-color, #6F6C90);
  font-size: 1.125rem;
  line-height: 1.875rem;
  display: none;
  opacity: 0;
  margin-top: 1rem;
  transition: all 1s ease;
}
.question_answer__active{
  transition: all 1s ease;
  display: block;
  opacity: 1;
}

@media (max-width: 768px) {
  .question_body{
    width: 100%;
  }
}
</style>