<template>
    <div class="container">
        <h3>Izdevumi</h3>
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nosaukums</th>
                        <th scope="col">Summa</th>
                        <th scope="col">Samaksāts?</th>
                        <th scope="col">Rezervēts?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(expense, index) in allExpenses" :key="index">
                        <td>{{ expense.name }}</td>
                        <td>{{ expense.amount }} EUR</td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" />
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "Expenses",
    data() {
        return {
            allExpenses: []
        };
    },
    methods: {
        getAllExpenses() {
            axios
                .get("/api/getAllExpenses")
                .then(response => {
                    this.allExpenses = response.data;
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    created() {
        this.getAllExpenses();
    }
};
</script>
