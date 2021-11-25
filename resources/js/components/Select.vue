<template>
  <div class="selector" @click="toggle()" :class="{ active: !visible, visible }">
      <div class="select-label" v-if="!label">
        <span>{{ select.value }}</span>
      </div>
      <div class="select-label" v-else>
        <span> {{ label }}</span>
      </div>
      <ul :class="{ hidden: !visible, visible }">
        <li v-for="item in select.list" @click="selectItem(item)" :key="item">
          {{ item }}
        </li>
      </ul>
    </div>
</template>
<script>
export default {
  props: ["select"],
  data: () => ({
    visible: false,
    label: null,
  }),
  methods: {
    toggle() {
      this.visible = !this.visible;
    },
    selectItem(item) {
      console.log(item);
      this.label = item;
      this.$emit("result", item);
    },
  },
};
</script>