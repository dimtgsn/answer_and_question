<template>
  <section class="admin-section admin">
    <div class="container">
      <div class="admin_navigation">
        <h2 class="admin_content_title" @click="changeAdminTitle('contentBlock')" :class="contentBlock === true ? 'admin_title__active' : ''">Content</h2>
        <h2 class="admin_design_title" @click="changeAdminTitle('designBlock')" :class="designBlock === true ? 'admin_title__active': ''">Design</h2>
      </div>
      <div class="line"></div>
      <div v-if="contentBlock">
        <AdminPanelContent />
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";
import AdminPanelContent from "../components/AdminPanelContent.vue";

const contentBlock = ref(true)
const designBlock = ref(false)

const changeAdminTitle = (changeBlock) => {
  if (changeBlock === "contentBlock"){
    contentBlock.value = true;
    designBlock.value = false;
  }
  if (changeBlock === "designBlock"){
    designBlock.value = true;
    contentBlock.value = false;
  }
}
</script>

<style scoped>
.admin-section{
  width: 90%;
  margin: 0 auto;
  border-radius: 1.125rem;
  background: #ffffff;
  padding: 2rem 0;
  box-shadow: 0 5px 16px 0 rgba(8, 15, 52, 0.06);
}
.admin_navigation{
  display: flex;
  justify-content: flex-start;
}
.admin_content_title,
.admin_design_title {
  font-size: 1.5rem;
  font-weight: 600;
  cursor: pointer;
  opacity: .5;
  transition: all .3s ease;
}
.admin_content_title:hover,
.admin_design_title:hover,
.admin_title__active{
  transition: all .3s ease;
  opacity: .85;
}
.admin_content_title{
  margin-right: 5rem;
}
.line{
  height: 2px;
  margin: .5rem 0 1rem 0;
  width: 100%;
  background: var(--question-body-color);
}
</style>