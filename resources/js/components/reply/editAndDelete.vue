<script>
export default {
    props: ['attributes'],
    data() {
        return {
            editing:false,
            body: this.attributes.body
        }
    },

    methods: {
        update() {
            axios.patch('/replies/' + this.attributes.id, {
                body: this.body
            });
            this.editing = false;
            flash('Updated reply!');
        },

        destroy() {
            axios.delete('/replies/' + this.attributes.id);
            $(this.$el).fadeOut(300, () => {
                flash('Deleted reply!');
            });
        }
    }
}
</script>
