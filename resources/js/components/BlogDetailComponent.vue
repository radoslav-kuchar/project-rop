<template>
    <v-app>

    <v-row class="m-5 d-flex justify-center">
        <v-col cols="12" xl="6" lg="6" md="6" class="d-flex justify-center">
            <v-img class="image" src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"></v-img>
        </v-col>

        <v-col cols="12" xl="6" lg="6" md="6">

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