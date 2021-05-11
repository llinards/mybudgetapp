<template>
  <div class="modal fade" id="expense">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label for="expenseName">Izdevums</label>
              <input
                type="text"
                class="form-control"
                id="expenseName"
                v-model="selectedExpense.name"
              />
            </div>
            <div class="form-group">
              <label for="expenseAmount">Summa</label>
              <input
                type="text"
                class="form-control"
                id="expenseAmount"
                v-model="selectedExpense.amount"
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Maksājuma statuss</label>
              <select
                v-model="selectedExpense.status"
                class="form-control"
                id="exampleFormControlSelect1"
              >
                <option v-for="(state, index) in states" :key="index" :value="state">
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
            <button @click="expenseData" data-dismiss="modal" class="btn btn-success">Atjaunot</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Expense",
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
    expenseData(e) {
      e.preventDefault();
      this.$emit('expense-data', this.selectedExpense);
    }
  },
};
</script>