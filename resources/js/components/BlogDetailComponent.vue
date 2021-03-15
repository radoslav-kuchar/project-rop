<template>
    <v-app>

    <v-row class="m-5">
        <v-col cols="6">
            <v-img
            class="white--text align-end"
            height="auto"
            src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            >
            </v-img>
        </v-col>

        <v-col>

            <v-card-title>{{ article.title }}</v-card-title>

            <v-card-text class="text--primary">
                <div>{{ article.content }}</div>
            </v-card-text>

        </v-col>
    </v-row>
        
            
        
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            

        }),

        methods: {
            
        },

        created() {
            
        },

        props: {
            article: {},
        }
    }
</script>