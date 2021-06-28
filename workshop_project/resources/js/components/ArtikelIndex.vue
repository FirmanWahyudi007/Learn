<template>
    <div>
        {{ artikels }}
    </div>
</template>
<script>
    export default {
        data() {
            return {
                artikels: []
            }
        },
        created() {
            let url = `api/artikel/paginate?page=1`;
            this.axios.get(url).then(response => {
                this.artikels = response.data;
            });
        }
    }
</script>