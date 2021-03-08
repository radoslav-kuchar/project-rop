<template>
    <v-app>

        <h1 class="mx-auto mt-5">iMake Blog</h1> 
        

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

            <v-card-title>Top 10 Najlepších služieb na iMake</v-card-title>
            <v-card-text class="text--primary">
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum imperdiet quis arcu eu dictum. Integer facilisis nec sem non semper. Proin volutpat dolor quis diam lacinia egestas. Praesent sit amet velit est. Maecenas dapibus, mi a ultricies convallis, nulla dolor sodales nibh, eu laoreet elit sem at odio.</div>
            </v-card-text>

            <v-card-actions>
                <a href="/blog/1"> <!-- v-bind:href=" '/blog/' + article.id" -->
                    <v-btn
                        plain class="black--text"  
                    >
                    Prečítať si viac...
                    </v-btn>
                </a>
            

            </v-card-actions>
        </v-card>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            

        }),

        methods: {
            
        },

        created() {
            
        }
    }
</script>