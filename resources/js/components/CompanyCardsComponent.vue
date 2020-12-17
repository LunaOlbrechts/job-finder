<template>
    <div>
        <div
            v-for="company in companies"
            v-bind:company="company"
            class="company--card-preview"
        >
            <div class="company--card-imgContainer">
                <img class="company--card-logo" v-bind:src='company.logo' />
            </div>
            <a class="company--card-title" href="/companies">
                <h3 class="company--card-name">{{ company.name }}</h3>
            </a>
            <p class="company--card-text">{{ company.bio }}</p>
            <div class="company--card-button">
                <a v-bind:href="company.id">></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            companies: []
        };
    },
    mounted: function() {
        this.getCompanies();
    },
    methods: {
        getCompanies: function() {
            var that = this;

            fetch("http://homestead.test/api/companies")
                .then(res => {
                    return res.json();
                })
                .then(json => {
                    that.companies = json;
                });
        }
    }
};
</script>
