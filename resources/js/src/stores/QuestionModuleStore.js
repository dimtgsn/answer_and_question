import {defineStore} from "pinia"
import {ref} from "vue";

export const useQuestionModuleStore = defineStore("questionModuleStore", () => {
    const topIndent = ref('')
    const bottomIndent = ref('')

    function getTopIndent() {
        if (localStorage.getItem('topIndent')){
            topIndent.value = JSON.parse(localStorage.getItem('topIndent'));
        }
        return topIndent;
    }

    function getBottomIndent() {
        if (localStorage.getItem('bottomIndent')){
            bottomIndent.value = JSON.parse(localStorage.getItem('bottomIndent'));
        }
        return bottomIndent;
    }

    function setTopIndent(indent) {
        topIndent.value = indent
        localStorage.setItem('topIndent', JSON.stringify(topIndent.value))
    }

    function setBottomIndent(indent) {
        bottomIndent.value = indent
        localStorage.setItem('bottomIndent', JSON.stringify(bottomIndent.value))
    }

    return {
        topIndent,
        bottomIndent,
        getTopIndent,
        getBottomIndent,
        setTopIndent,
        setBottomIndent
    }
})