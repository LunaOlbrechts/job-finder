<template>
    <div>
        <h1>test12</h1>  
        <div class="company--card-preview">
            <div class="company--card-imgContainer">
                <img class="company--card-logo" src="">
            </div>
            <a class="company--card-title" href="/companies">
                <h3 class="company--card-name"></h3>
            </a>
            <p class="company--card-text"></p>
            <div class="company--card-button">
                <a href="/companies">></a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted: function(){
            this.getCompanies();
        },
        methods:{
            getCompanies: function(){
                fetch('http://homestead.test/api/companies')
                .then(res => {
                    console.log("lol");
                    return res.json();
                })
                .then( json => {
                    console.log(json);
                });
            }
        }
    }
</script>