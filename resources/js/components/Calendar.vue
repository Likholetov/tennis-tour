<template>
    <calendar :first-day="1" :all-events="events"></calendar>
</template>

<script>
import { Calendar } from "vue-bootstrap-calendar";
export default {
    name: "app",
    data() {
        return {
            events: [],
        };
    },
    components: {
        Calendar,
    },
    mounted() {
        let me = this;
        setTimeout(function () {
            me.events = [
                // you can make ajax call here
                {
                    id: 1,
                    title: "Event 1",
                    color: "panel-danger",
                    date: new Date(),
                },
            ];
        }, 1000);
    },
};
</script>

<style lang="scss">
#calendar > div:first-child {
    display: block !important;
}
</style>
