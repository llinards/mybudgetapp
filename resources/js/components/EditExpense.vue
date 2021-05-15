<template>
  <div class="modal fade" id="editExpense">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="editExpenseName">Izdevums</label>
              <input
                type="text"
                class="form-control"
                id="editExpenseName"
                v-model="selectedExpense.name"
              />
            </div>
            <div class="form-group">
              <label for="editExpenseAmount">Summa</label>
              <input
                type="text"
                class="form-control"
                id="editExpenseAmount"
                v-model="selectedExpense.amount"
              />
            </div>
            <div class="form-group">
              <label for="editExpenseStatus">Maksājuma statuss</label>
              <select
                v-model="selectedExpense.status"
                class="form-control"
                id="editExpenseStatus"
              >
                <option
                  v-for="(state, index) in states"
                  :key="index"
                  :value="state"
                >
                  {{ status(state) }}
                </option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Aizvērt
            </button>
            <button
              @click.prevent="editExpense"
              data-dismiss="modal"
              class="btn btn-success"
            >
              Atjaunot
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "EditExpense",
  props: ["selectedExpense"],
  data() {
    return {
      states: [0, 1, 2],
    };
  },
  methods: {
    status(state) {
      if (state == 0) {
        return "Nav samaksāts";
      } else if (state == 1) {
        return "Rezervēts";
      } else if (state == 2) {
        return "Samaksāts";
      } else {
        return "";
      }
    },
    editExpense() {
      this.$emit("edit-expense", this.selectedExpense);
    },
  },
};
</script>