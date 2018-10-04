<template>
    <div>
        <h2 class="text-center">Add Film</h2>
        <b-container fluid>
            <b-row class="my-1">
                <b-col sm="3"><label :for="name">Name: </label></b-col>
                <b-col sm="9">
                    <b-form-input :id="name" v-model="name"></b-form-input>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="description">Description: </label></b-col>
                <b-col sm="9">
                    <b-form-textarea :id="description" v-model="description" :rows="3" :max-rows="6"></b-form-textarea>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="releaseDate">Release Date: </label></b-col>
                <b-col sm="9">
                    <date-picker :id="releaseDate" v-model="releaseDate" :config="dateOptions"></date-picker>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="rating">Rating: </label></b-col>
                <b-col sm="9">
                    <b-form-radio-group v-model="rating" :id="rating" :options="ratingArray"
                                        name="radioInline"></b-form-radio-group>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="ticketPrice">Ticket Price: </label></b-col>
                <b-col sm="9">
                    <b-form-input type="number" v-model="ticketPrice" min="0.00"></b-form-input>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="country">Country: </label></b-col>
                <b-col sm="9">
                    <b-form-select v-model="country" :options="options" class="mb-3"/>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="selectedGenre">Genre: </label></b-col>
                <b-col sm="9">
                    <multiselect v-model="selectedGenre" label="value" tracked-by="id" :multiple="true"
                                 :id="selectedGenre" :options="genreArray"></multiselect>
                </b-col>
            </b-row>
            <b-row class="my-1">
                <b-col sm="3"><label :for="photo">Photo: </label></b-col>
                <b-col sm="9">
                    <b-form-file v-model="photo" ref="fileinput"></b-form-file>
                </b-col>
            </b-row>
            <div class="alert alert-danger" v-if="errors">
                <ul v-for="error in errors">
                    <li>{{error}}</li>
                </ul>
            </div>
            <button type="button" class="col-2 btn btn-primary btn-block btn-flat mt-4" @click.prevent="addFilm">
                Submit
            </button>
        </b-container>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                name: '',
                description: '',
                releaseDate: '',
                rating: '',
                ticketPrice: '',
                country: '',
                options: [],
                dateOptions: {
                    format: 'YYYY/MM/DD',
                    useCurrent: false,
                },
                selectedGenre: [],
                selectedGenreIds: [],
                photo: null,
                ratingArray: [
                    {text: '1', value: '1'},
                    {text: '2', value: '2'},
                    {text: '3', value: '3'},
                    {text: '4', value: '4'},
                    {text: '5', value: '5'},
                ],
                genreArray: [],
                errors: null
            }
        },
        watch: {
            selectedGenre(newValues) {
                this.selectedGenreIds = newValues.map(obj => obj.id);
            }
        },
        created() {
            axios.get('/api/country/list')
                .then(response => {
                    this.options = response.data;
                });
            axios.get('/api/genre/list')
                .then(response => {
                    this.genreArray = response.data;
                })
        }, methods: {
            addFilm() {
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('description', this.description);
                formData.append('release_date', this.releaseDate);
                formData.append('rating', this.rating);
                formData.append('ticket_price', this.ticketPrice);
                formData.append('country_id', this.country);
                formData.append('genre', this.selectedGenreIds);
                formData.append('photo', this.photo);
                let config = {'Accept': 'application/json', 'Authorization': "Bearer " + localStorage.getItem('token')};
                axios.post('/api/film', formData, {headers: config})
                    .then(function () {
                        this.name = '';
                        this.description = '';
                        this.releaseDate = '';
                        this.rating = '';
                        this.ticketPrice = '';
                        this.country = '';
                        this.selectedGenre = [];
                        this.selectedGenreIds = [];
                        this.selectedGenre = [];
                        this.photo = null;
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.errors = _.flatten(_.toArray(error.response.data.errors));
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .multiselect {
        margin-top: -10px;
    }
</style>