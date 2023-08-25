<template>
  <div class="wrapper">
    <header class="header">
      <div class="container header_container">
        <router-link :to="'/'">
          <h1 class="header_title">Answers On Questions</h1>
        </router-link>
        <router-link :to="this.$route.fullPath !== '/admin-panel' ? '/admin-panel' : '/'" >
          <div class="add_question">
            <h2 class="add_question_title">
              {{ this.$route.fullPath !== "/admin-panel" ? "AdminPanel" : "Home" }}
            </h2>
          </div>
        </router-link>
      </div>
    </header>
    <main class="main">
     <router-view />
    </main>
  </div>
</template>

<script setup>
</script>

<style scoped>
.header_container{
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.header_title{
  font-family: Tahoma, sans-serif;
  font-size: 1.5rem;
  font-weight: 700;
  line-height: 2.1875rem;
  transition: all .3s ease;
  opacity: 1;
  color: var(--main-text-color);
  cursor: pointer;
}
.header_title:hover{
  transition: all .3s ease;
  opacity: .8;
  color: var(--main-text-color);
}
.add_question{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 1rem 1.75rem 1.0625rem 1.75rem;
  border-radius: 3.125rem;
  color: var(--btn-color, #4A3AFF);
  background-color: var(--btn-bg-color, #F3F1FF);
  margin-left: 1.5rem;
  cursor: pointer;
  transition: all .3s ease;
}
.add_question:hover{
  background-color: rgba(74, 58, 255, 0.1);
}
.add_question_title{
  font-size: 1rem;
  font-weight: 500;
  line-height: 1.125rem;
}
</style>
