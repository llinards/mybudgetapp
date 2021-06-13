<template>
  <div class="container">
    <StatusMsg
      v-if="showStatusMsgAlert"
      :statusMsg="statusMsg"
      :status="status"
    />
    <Expenses @return-status="showStatusMsg" />
  </div>
</template>

<script>
import Expenses from "./components/Expenses";
import StatusMsg from "./components/StatusMsg";
export default {
  components: {
    Expenses,
    StatusMsg,
  },
  data() {
    return {
      statusMsg: "",
      status: false,
      showStatusMsgAlert: false,
    };
  },
  methods: {
    showStatusMsg(status, msg) {
      this.showStatusMsgAlert = true;
      this.status = status;
      this.statusMsg = msg;
    },
  },
};
</script>
<style></style>
