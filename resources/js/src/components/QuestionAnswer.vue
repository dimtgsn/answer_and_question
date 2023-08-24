<template>
  <div class="question_body">
    <div class="container question_container">
      <div class="question_content">
        <h2 class="question_title">Lorem ipsum dolor sit amet, consectetur adipisicing elitsimilique?</h2>
        <p id="answer" class="question_answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eveniet fuga fugiat, numquam officiis omnis sint totam. Alias consequatur deleniti nisi nostrum officia qui quisquam sint tempora totam ut? Adipisci aspernatur atque corporis cum debitis deleniti ea eos eveniet, fugiat magnam modi molestias neque quia recusandae reprehenderit? Dicta illum laudantium maxime nostrum repellat? Architecto commodi consectetur cum dignissimos dolor dolorem dolorum earum error exercitationem illo ipsum iste iusto labore laudantium maxime molestias non nulla obcaecati officia perspiciatis quibusdam quod repellat repellendus sapiente similique suscipit, voluptas voluptatibus! At aut, cum eius eveniet fuga ipsum, iste magni obcaecati quas quo repellat totam.</p>
      </div>
      <div class="question_arrow">
        <QuestionArrow />
      </div>
    </div>
  </div>
</template>

<script setup>
import QuestionArrow from "./QuestionArrow.vue";
</script>

<style scoped>
.question-section{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.question_body{
  width: 85%;
  cursor: pointer;
  border-radius: 1.125rem;
  background: #ffffff;
  border: 2px solid transparent;
  box-shadow: 0 5px 16px 0 rgba(8, 15, 52, 0.06);
  padding: 2.9rem 0;
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