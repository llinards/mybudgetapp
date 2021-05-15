<template>
  <div class="container">
    <h5>Izdevumi</h5>
    <button
      class="btn btn-success mb-1"
      data-toggle="modal"
      data-target="#addExpense"
    >
      Pievienot izdevumu
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
          <td class="text-right" colspan="4">
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
      allExpenses: {},
    };
  },
  methods: {
    getAllExpenses() {
      axios
        .get("/api/getAllExpenses")
        .then((response) => {
          this.allExpenses = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
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
    deleteExpense(id) {
      this.allExpenses = this.allExpenses.filter(
        (expense) => expense.id !== id
      );
    },
    editExpense(expense) {
      console.log(expense);
    },
    addExpense(expense) {
      this.allExpenses.push(expense);
    },
  },
  computed: {
    totalSumOfExpenses() {
      let total = 0;
      for (var i = 0; i < this.allExpenses.length; i++) {
        total += parseFloat(this.allExpenses[i].amount);
      }
      return total;
    },
  },
  created() {
    this.getAllExpenses();
  },
};
</script>
<style scoped>
.buttons {
  text-align: right;
}
@media (max-width: 768px) {
  .buttons {
    text-align: center;
  }

  .buttons button:first-child {
    margin-bottom: 0.5rem;
  }
}
</style>
