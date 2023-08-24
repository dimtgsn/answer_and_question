<template>
  <div class="arrow_btn">
    <svg width="19" height="12" viewBox="0 0 19 12" fill="none">
      <path class="arrow_svg" d="M1.42529 1.86206L9.68188 10.0813L17.9385 1.86206" stroke="#4A3AFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>
</template>

<script setup>

</script>

<style scoped>
.arrow_btn{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 3.16638rem;
  height: 3.16638rem;
  border-radius: 50%;
  background-color: #ffffff;
  box-shadow: 0 12px 24px 0 rgba(20, 20, 43, 0.04), 0 -2px 4px 0 rgba(20, 20, 43, 0.02), 0 3px 14px 0 rgba(74, 58, 255, 0.03);
  cursor: pointer;
  transform: rotate(-90deg);
  transition: all .3s ease;
}
.arrow_btn:hover{
  transition: all .3s ease;
  box-shadow: none;
  transform: rotate(0);
}
.arrow_svg{
  transition: all .3s ease;
}
.arrow_svg__active{
  stroke: #ffffff;
  transition: all .3s ease;
}

.arrow_btn__active{
  background-color: #4A3AFF;
  opacity: 1;
  transition: all .3s ease;
  transform: rotate(0);
  box-shadow: none;
}
.arrow_btn__active:hover{
  transition: all .3s ease;
  opacity: .85;
}
</style>