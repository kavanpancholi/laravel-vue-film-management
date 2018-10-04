<template>
    <div>
        <h2 class="float-left">Films</h2>
        <b-button :to="{ name: 'addFilm' }" class="float-right" v-if="this.$store.getters.isLoggedIn">Add Film</b-button>
        <table class="table table-hover product-table">
            <thead>
            <tr>
                <th width="20%">Name</th>
                <th width="70&">Description</th>
                <th width="10%">Price</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="film in films" track-by="id">
                <td>
                    <router-link :to="{ name: 'showFilm', params:{slug: film.slug } }">{{film.name}}</router-link>
                </td>
                <td>{{film.description}}</td>
                <td>{{film.ticket_price}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                films: []
            }
        },
        created() {
            axios.get('/api/film')
                .then(response => {
                    this.films = response.data.films;
                })
        }
    }
</script>

<style scoped>

</style>