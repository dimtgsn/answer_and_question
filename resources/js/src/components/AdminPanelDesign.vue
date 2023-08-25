<template>
  <div class="design-section">
    <div class="top_indent">
      <h2 class="design_subtitle">Top Indent (px):</h2>
      <div class="form-group">
        <div class="form-input_wrapp"
             :class="{
              'input-error': v$.top_indent.$error,
              'input-invalid': !v$.top_indent.$invalid,
            }">
          <input class="form_input"
                 type="number"
                 id="top_indent"
                 name="top_indent"
                 v-model.trim="formData.top_indent"
                 @change="v$.top_indent.$touch">
          <div v-if="v$.top_indent.$error" class="error_message">
            {{ v$.top_indent.$errors[0].$message }}
          </div>
        </div>
      </div>
    </div>
    <div class="bottom_indent">
      <h2 class="design_subtitle">Bottom Indent (px):</h2>
      <div class="form-group">
        <div class="form-input_wrapp"
             :class="{
              'input-error': v$.bottom_indent.$error,
              'input-invalid': !v$.bottom_indent.$invalid,
            }">
          <input class="form_input"
                 type="number"
                 id="bottom_indent"
                 name="bottom_indent"
                 v-model.trim="formData.bottom_indent"
                 @change="v$.bottom_indent.$touch">
          <div v-if="v$.bottom_indent.$error" class="error_message">
            {{ v$.bottom_indent.$errors[0].$message }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="send-form" >
    <div v-if="v$.top_indent.$error || formData.top_indent === '' || v$.bottom_indent.$error || formData.bottom_indent === ''"
         class="send-form-btn__disabled">
      Save
    </div>
    <div v-else @click.prevent="choseIndent" class="send-form-btn">
      Save
    </div>
  </div>
</template>

<script setup>
import {computed, reactive} from "vue";
import {helpers, required, minValue} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import { useQuestionModuleStore } from "../stores/QuestionModuleStore.js";

const emits = defineEmits(['backToContentBlock'])

const topIndent = useQuestionModuleStore().getTopIndent().value
const bottomIndent = useQuestionModuleStore().getBottomIndent().value
const formData = reactive({
  top_indent: topIndent !== '' ? parseInt(topIndent) : '',
  bottom_indent: bottomIndent !== '' ? parseInt(bottomIndent) : '',
})

const rules = computed(() => {
  return {
    top_indent: {
      required: helpers.withMessage('Indent is required', required),
      minLength: helpers.withMessage('Value too little', minValue(1)),
    },
    bottom_indent: {
      required: helpers.withMessage('Indent is required', required),
      minLength: helpers.withMessage('Value too little', minValue(1)),
    },
  }
});
const v$ = useVuelidate(rules, formData);

const choseIndent = () => {
  useQuestionModuleStore().setTopIndent(String(formData.top_indent))
  useQuestionModuleStore().setBottomIndent(String(formData.bottom_indent))
  emits('backToContentBlock')
}
</script>

<style scoped>
.design-section{
  display: flex;
  justify-content: space-between;
  margin-top: 2rem;
}
.top_indent,
.bottom_indent {
  flex: 45% 0 1;
  display: flex;
  flex-direction: column;
}
.design_subtitle{
  font-size: 1.225rem;
  color: #170F49;
  opacity: .7;
  padding-bottom: .5rem;
  font-weight: 400;
  cursor: pointer;
  transition: all .5s ease;
}
.form-input_wrapp{
  width: 15rem;
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
.send-form{
  margin-top: 4rem;
}
.send-form-btn,
.send-form-btn__disabled{
  width: 15rem;
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

@media (max-width: 560px) {
  .design-section{
    flex-direction: column;
  }
}
</style>