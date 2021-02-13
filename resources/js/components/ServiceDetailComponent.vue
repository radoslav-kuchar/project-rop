<template>
    <v-app>
        <v-row class="m-5">
            <v-col cols="6">
                <v-carousel
                :continuous="false"
                :cycle="cycle"
                :show-arrows="false"
                hide-delimiter-background
                delimiter-icon="mdi-minus"
                >
                    <!-- <v-carousel-item
                        v-for="item in items"
                        :key="item[0].id"
                        :src="  'storage/' + item[0].path[0]  "
                        reverse-transition="fade-transition"
                        transition="fade-transition"
                    >
                        
                    </v-carousel-item> -->
                </v-carousel>
            </v-col>
            <v-col cols="6">

            </v-col>
        </v-row>

        <!-- <h3 class="">{{ service[0].city }}</h3> -->

    </v-app>
</template>

<script>
export default {

    data: () => ({
        cycle: true,
        items: [],
        
        

    }),

    methods: {
        

    },

    created() {
        //this.getService();

        /* console.log(window.location.href); */
        
        console.log(this.items);
        console.log(this.service[0]);
        
    },

    mounted() {
        this.items = this.service;
    },

    props: ['service'],

    

    
    
};
</script>