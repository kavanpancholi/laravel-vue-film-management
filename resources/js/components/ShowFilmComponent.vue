<template>
    <div>
        <h2 class="text-center">{{ film.name }}</h2>
        <div class="d-flex flex-row">
            <div class="w-50 p-3">
                <b-img thumbnail :src="film.photo" :alt="film.name"/>
            </div>
            <div class="w-50 p-3">
                <dl class="dl-horizontal">
                    <dt>Description</dt>
                    <dd>{{ film.description }}</dd>
                    <dt>Release Date</dt>
                    <dd>{{ film.release_date }}</dd>
                    <dt>Rating</dt>
                    <dd>{{ film.rating }}</dd>
                </dl>
                <div class="comment-container">
                    <h3 class="text-center">Comments</h3>
                    <div class="add-comment" v-if="this.$store.getters.isLoggedIn">
                        <b-form-textarea id="comment" v-model="comment" placeholder="Comment" :rows="3" :max-rows="6">
                        </b-form-textarea>
                        <button type="button" class="btn btn-primary btn-block btn-flat" @click.prevent="addComment"><i
                                class="fa fa-sign-in"></i> Submit
                        </button>
                    </div>
                    <div class="comments-outside mt-3">
                        <div class="comment" v-for="comment in film.comments">
                            <b-card class="mt-2">
                                <p class="card-text">
                                    {{comment.comment}}
                                </p>
                                <em slot="footer">{{comment.user.name}}</em>
                            </b-card>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                film: [],
                comment: ''
            }
        },
        created() {
            this.getFilm();
        },
        methods: {
            addComment() {
                let that = this;
                let data = {film_id: this.film.id, comment: this.comment};
                let config = {'Accept': 'application/json', 'Authorization': "Bearer " + localStorage.getItem('token')};
                axios.post('/api/comment', data, {headers: config})
                    .then(function () {
                        that.comment = '';
                        that.getFilm()
                    });
            },
            getFilm() {
                axios.get('/api/film/' + this.$route.params.slug)
                    .then(response => {
                        this.film = response.data.film;
                    })
            }
        }
    }
</script>

<style scoped>

</style>