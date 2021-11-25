<template>
   <form action="#" class="players__form">
      <my-select
         v-for="(select, index) in selects"
         :key="index"
         :select="select"
         v-on:result="result"
      ></my-select> 
   </form>
</template>

<script>
export default {
    data() {
        return {
            selects: [
                {
                    value: "Год",
                    list: ["1", "2", "3"],
                },
                {
                    value: "Месяц",
                    list: ["1", "2", "3"],
                },
                {
                    value: "День",
                    list: ["1", "2", "3"],
                },
            ],
        };
        
    },
    methods: {
        result(item) {
            console.log("result=>", item);
        },
    },
};
</script>