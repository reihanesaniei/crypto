<template>
    <div class="container">
        <div class="row">
            <table class="table table-striped" id="app">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">سمبل</th>
                    <th scope="col">نام ارز</th>
                    <th scope="col">قیمت (usd)</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="price in prices" :key="price.id">
                    <td>{{price.name}}</td>
                    <td>{{price.symbol}}</td>
                    <td>{{price.current_price}}</td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
        export default {
        name: "app",
        data() {
            return {
                prices: {
                    name : this.prices.name,
                    symbol : this.prices.symbol,
                    current_price : this.prices.current_price

                },
            }
        },
        methods: {
            getPrice(){
                axios.get('/prices')
                    .then((response)=>{
                        this.prices = response.data.prices

                    })
            }
        },
        created() {
            this.getPrice()
        }
    }
</script>

<style scoped>

</style>
