<template>
    <v-app>

        <h1 class="mx-auto mt-5">iMake Blog</h1>  
        <v-col cols="12" lg="9" md="12">
            <v-row  >
                <v-col cols="12" lg="4" md="4" sm="6"  v-for="post in posts" :key="post.id">
                    <v-card
                        class="m-5"
                        max-width="400"
                    >
                        <v-img
                        class="white--text align-end"
                        height="200px"
                        src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
                        >
                        </v-img>

                        <v-card-title>{{ post.title }}</v-card-title>
                        <v-card-text class="text--primary">
                            <div>{{ post.content | truncate(200, '...') }}</div>
                        </v-card-text>

                        <v-card-actions>
                            <a v-bind:href=" '/articles/' + post.id ">
                                <v-btn
                                    plain class="black--text"  
                                >
                                Prečítať si viac...
                                </v-btn>
                            </a>
                            </v-card-actions>
                    </v-card>
                </v-col> 
            </v-row>   
        </v-col>

            
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            

        }),

        methods: {
            
        },

        created() {
            console.log(this.posts)
        },

        filters: {
            truncate: function (text, length, suffix) {
                if (text.length > length) {
                    return text.substring(0, length) + suffix;
                } else {
                    return text;
                }
            },
        },

        props: {
            posts: {},
        }
    }
</script>