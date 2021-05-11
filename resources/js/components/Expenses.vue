<template>
  <div class="container">
    <h4>Izdevumi</h4>
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
            <td class="text-right">
              <button
                type="button"
                @click="selectedExpense = expense"
                class="btn btn-warning"
                data-toggle="modal"
                data-target="#expense"
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
        </tbody>
      </table>
    </div>
    <Expense :selectedExpense="selectedExpense" @expense-data="modifyExpenses" />
  </div>
</template>

<script>
import Expense from "./Expense";
export default {
  name: "Expenses",
  components: {
    Expense,
  },
  data() {
    return {
      selectedExpense: {},
      allExpenses: [],
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
    modifyExpenses(expense) {
      console.log(expense);
    }
  },
  created() {
    this.getAllExpenses();
  },
};
</script>
