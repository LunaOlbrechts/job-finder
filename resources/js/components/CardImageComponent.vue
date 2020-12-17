<template>
    <div class="company--card-imgContainer">
        <img class="company--card-logo" src="{{ $company->logo }}">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
