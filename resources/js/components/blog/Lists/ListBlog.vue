<template>
    <div>
        <div class="card mt-3">
            <elements-blog :data="this.blog"></elements-blog>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                blog:[],
            }
        },
        mounted() {
            VueEvent.$on('fetchBlog123', () => {
                this.fetchBlog();
            });
        },
        watch: {
            data() {}
        },
        created(){
           this.fetchBlog();
        },
        methods: {
           fetchBlog(){
               fetch('api/v1/Blog/Lists/list-blog').then(response => response.json())
                   .then(response => {
                       this.blog = response.data;
                       console.log(this.blog)
                   })
                   .catch(error => console.log(error))
           },
            // http://localhost/class1/public/api/v1/Blog/Lists/list-blog
        }

    }

</script>
