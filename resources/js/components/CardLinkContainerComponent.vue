<template>
    <div class="company--card-button">
        <a href="/companies/{{ $company->id }}">></a>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
