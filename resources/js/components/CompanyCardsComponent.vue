<template>
    <div class="cards">
        <div v-for="company in companies" v-bind:key="company" class="card--preview card--preview-padd" >
            <div class="card--imgContainer">
                <img class="card--logo" v-bind:src='company.logo' />
            </div>
            <a class="card--title" href="/companies">
                <h3 class="card--name">{{ company.name }}</h3>
            </a>
            <p class="card--text">{{ company.bio }}</p>
            <p class="card--text-sm">{{ company.location }}</p>
            <a v-bind:href="'/companies/' + company.id" class="btn--primary-gold btn--primary-sm">Bekijk profiel</a>
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
