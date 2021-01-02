<template>
    <div class="container" style="max-width: 90em !important;">
        <div class="row row-cols-1 row-cols-md-4 g-4">
                <div v-for="shot in shots" v-bind:key="shot" class="card" style="width: auto;">
                    <img class="card-img-top" v-bind:src='shot.image' />
                    <div class="card-body">
                        <h5 class="card-title">{{ shot.title }}</h5>
                        <a v-bind:href="'https://dribbble.com' + shot.link" target="_blank" class="btn btn-primary">
                            View artwork
                        </a>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return{
                shots: []
            }
        },
        mounted(){
            this.loadShots();
        },
        methods: {
            loadShots: function() {
            var that = this;

            var url = window.location.href;
            var urlid = url.substr(url.lastIndexOf('/')+1);

            fetch("http://homestead.test/api/students/" + urlid)
                .then(res => {
                    return res.json();
                })
                .then(json => {
                    that.shots = json;
                    
                });
            }
        }
    }
</script>
