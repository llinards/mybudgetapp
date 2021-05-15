<template>
  <div class="modal fade" id="addExpense">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="addExpenseName">Pievienot jaunu izdevumu</label>
              <input
                type="text"
                class="form-control"
                id="addExpenseName"
                v-model="newExpense.name"
              />
            </div>
            <div class="form-group">
              <label for="addExpenseAmount">Summa</label>
              <input
                type="number"
                class="form-control"
                id="addExpenseAmount"
                v-model="newExpense.amount"
              />
            </div>
            <div class="form-group">
              <label for="addExpenseStatus">Maksājuma statuss</label>
              <select
                class="form-control"
                id="addExpenseStatus"
                v-model="newExpense.status"
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
              @click.prevent="addExpense"
              data-dismiss="modal"
              class="btn btn-success"
            >
              Pievienot
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "AddExpense",
  data() {
    return {
      states: [0, 1, 2],
      newExpense: {
        name: "",
        amount: 0.0,
        status: 0,
      },
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
    addExpense() {
      this.$emit("add-expense", this.newExpense);
    },
  },
};
</script>