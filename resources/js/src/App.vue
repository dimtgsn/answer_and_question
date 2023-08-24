<template>
  <div class="wrapper">
    <header class="header">
      <div class="container header_container">
        <h1 class="header_title">Answers on Questions</h1>
        <router-link :to="this.$route.fullPath !== '/admin-panel' ? '/admin-panel' : '/'" >
          <div class="add_question">
            <h2 class="add_question_title">
              <!--            <svg fill="#4A3AFF" width="1rem" height="1rem" viewBox="0 0 45.402 45.402" xml:space="preserve">-->
              <!--              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>-->
              <!--              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>-->
              <!--              <g id="SVGRepo_iconCarrier">-->
              <!--                <g>-->
              <!--                  <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z">-->
              <!--                  </path>-->
              <!--                </g>-->
              <!--              </g>-->
              <!--              </svg>-->
              {{ this.$route.fullPath !== "/admin-panel" ? "Admin Panel" : "Home" }}
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
