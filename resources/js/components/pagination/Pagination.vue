<template>
    <nav>
        <ul class="pagination">
            <li class="paginate_item page-item" :class="{ 'disabled': meta.current_page === 1}">
                <a href="#" @click.prevent="switched(meta.current_page-1)" class="paginate_button previous page-link">
                    <span>
                        &laquo;
                    </span>
                </a>
            </li>
            <li class="paginate_item page-item" :class="{ ' active': meta.current_page === x }" v-for="x in meta.last_page">
                <a href="#" @click.prevent="switched(x)" class="paginate_button page-link" >{{ x }}</a>
            </li>
            <li class="paginate_item page-item" :class="{ 'disabled': meta.current_page === meta.last_page}">
                <a href="#" @click.prevent="switched(meta.current_page+1)" class="paginate_button next page-link">
                    <span>
                        &raquo;
                    </span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: [
            'meta'
        ],
        methods: {
            switched(page){
                if (this.pageIsOutBounds(page)){
                    return;
                }
                this.$emit('pagination:switched', page)

                this.$router.replace({
                    query: Object.assign({}, this.$route.query, {page})
                })
            },
            pageIsOutBounds(page){
                return page <= 0 || page > this.meta.last_page
            }
        }
    }
</script>

<style scoped>

</style>
