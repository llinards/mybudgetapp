<template>
  <div>
    <div class="alert" :class="statusType" role="alert">
      {{ statusMsg }}
      <button
        type="button"
        class="close"
        data-dismiss="alert"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: "StatusMsg",
  props: ["statusMsg", "status"],
  data() {
    return {};
  },
  computed: {
    statusType() {
      if (this.status) {
        return "alert-success";
      } else {
        return "alert-danger";
      }
    },
  },
};
</script>