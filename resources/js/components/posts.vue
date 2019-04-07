<template>
    <div>
        <ul v-if="posts && posts.length">
            <li v-bind:key="post.id" v-for="post of posts">
                <p>{{post.user.name}}<br>{{post.content}}</p>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data () {
        return {
            posts: [],
            fetching: null
        }
    },
    created () {
        this.getJson();
        this.pullData();
    },
    beforeDestroy () {
        clearInterval(this.fetching)
    },
    methods: {
        getJson: function() {
            axios
            .get('/json/posts')
            .then(response => (this.posts = response.data));
        },
        pullData: function() {
            this.fetching = setInterval(() => {
                this.getJson()
            }, 3000);
        }
    }
}
</script>
