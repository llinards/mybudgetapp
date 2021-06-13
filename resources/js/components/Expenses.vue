<template>
  <div>
    <h5>Izdevumi</h5>
    <button
      class="btn btn-success mb-1"
      data-toggle="modal"
      data-target="#addExpense"
    >
      +
    </button>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nosaukums</th>
            <th scope="col">Summa</th>
            <th scope="col">Statuss</th>
            <th scope="col" />
          </tr>
        </thead>
        <tbody>
          <tr v-for="expense in allExpenses" :key="expense.id">
            <td>{{ expense.name }}</td>
            <td>{{ expense.amount }} EUR</td>
            <td>{{ expenseStatus(expense) }}</td>
            <td class="buttons">
              <button
                type="button"
                @click="selectedExpense = expense"
                class="btn btn-warning"
                data-toggle="modal"
                data-target="#editExpense"
              >
                Rediģēt
              </button>
              <button
                type="button"
                @click="deleteExpense(expense.id)"
                class="btn btn-danger"
              >
                Dzēst
              </button>
            </td>
          </tr>
          <td class="total" colspan="4">
            <h5>Kopā: {{ totalSumOfExpenses }} EUR</h5>
          </td>
        </tbody>
      </table>
    </div>
    <EditExpense
      :selectedExpense="selectedExpense"
      @edit-expense="editExpense"
    />
    <AddExpense @add-expense="addExpense" />
  </div>
</template>

<script>
import AddExpense from "./AddExpense";
import EditExpense from "./EditExpense";
export default {
  name: "Expenses",
  components: {
    AddExpense,
    EditExpense,
  },
  data() {
    return {
      selectedExpense: {},
      allExpenses: [],
      updatedExpenses: false,
    };
  },
  methods: {
    expenseStatus(expense) {
      if (expense.status == 0) {
        return "Nav samaksāts";
      } else if (expense.status == 1) {
        return "Rezervēts";
      } else if (expense.status == 2) {
        return "Samaksāts";
      } else {
        return "";
      }
    },
    getAllExpenses() {
      axios
        .get("/api/expenses")
        .then((response) => {
          this.allExpenses = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    addExpense(expense) {
      axios
        .post("/api/expenses", {
          name: expense.name,
          amount: expense.amount,
          status: expense.status,
        })
        .then((response) => {
          if (response.data == true) {
            this.getAllExpenses();
            this.$emit("return-status", true, "Izdevums pievienots!");
          } else {
            this.$emit("return-status", false, "Kļūda pievienojot izdevumu!");
          }
        })
        .catch((err) => {
          this.$emit("return-status", false, "Kļūda pievienojot izdevumu!");
        });
    },
    editExpense(expense) {
      axios
        .put(`/api/expenses/${expense.id}`, {
          name: expense.name,
          amount: expense.amount,
          status: expense.status,
        })
        .then((response) => {
          if (response.data == true) {
            this.getAllExpenses();
            this.$emit("return-status", true, "Izdevums atjaunots!");
          } else {
            this.$emit("return-status", false, "Kļūda atjaunojot izdevumu!");
          }
        })
        .catch((err) => {
          this.$emit("return-status", false, "Kļūda atjaunojot izdevumu!");
        });
    },
    deleteExpense(id) {
      axios
        .delete(`/api/expenses/${id}`)
        .then((response) => {
          if (response.data == true) {
            this.allExpenses = this.allExpenses.filter(
              (expense) => expense.id !== id
            );
            this.$emit("return-status", true, "Izdevums dzēsts!");
          } else {
            this.$emit("return-status", false, "Kļūda dzēšot izdevumu!");
          }
        })
        .catch((err) => {
          this.$emit("return-status", false, "Kļūda dzēšot izdevumu!");
        });
    },
  },
  computed: {
    totalSumOfExpenses() {
      let total = 0;
      this.allExpenses.forEach((expense) => {
        total += parseFloat(expense.amount);
      });
      return total;
    },
  },
  created() {
    this.getAllExpenses();
  },
};
</script>
<style scoped>
.buttons,
.total {
  text-align: right;
}
@media (max-width: 768px) {
  .buttons {
    text-align: center;
  }
  .total {
    text-align: left;
  }
  .buttons button:first-child {
    margin-bottom: 0.5rem;
  }
}
</style>
