<template>
    <v-app>
        <!-- <v-row class="m-5">
            <v-col cols="6">
                <v-carousel
                :continuous="false"
                :cycle="cycle"
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-minus"
                >
                    <v-carousel-item
                        v-for="service in services"
                        :key="service.id"
                        :src="  'storage/' + service.path[0]  "
                        reverse-transition="fade-transition"
                        transition="fade-transition"
                    >
                        
                    </v-carousel-item>
                </v-carousel>
            </v-col>
            <v-col cols="6">

            </v-col>
        </v-row> -->

        <h3 class="">{{ service }}</h3>

    </v-app>
</template>

<script>
export default {

    data: () => ({
        /* cycle: true,
        services: [], */
        

    }),

    methods: {
       /* getService() {
            axios.get('/service/').then(response => {
                this.services = response.data
            }).catch(errors =>
                console.log(errors)
            )
        }, */

    },

    created() {
        //this.getService();

        /* console.log(window.location.href); */
    },

    props: [
        'service',

    ]

    
    
};
</script>