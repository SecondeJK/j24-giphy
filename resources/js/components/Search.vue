<template>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card card-sm">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        <div class="col">
                            <input class="form-control form-control-lg form-control-borderless" type="search" v-model=searchTerm placeholder="Search for Gifs">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-lg btn-primary" @click="doSearch">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=flex v-for="gif in images">
            <img :src=gif></img>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                searchTerm: "",
                images: []
            }
        },
        methods: {
            doSearch() {
                axios.get('/api/search?term=' + this.searchTerm)
                    .then(res => {
                        this.images = res.data;
                        console.log(res.data);
                    });
            }
        }
    }
</script>

<style>
    .flex {
        display: inline-flex;
        padding: 5px;
    }
</style>
