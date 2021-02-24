<template>
    <v-app>
        
            
            

                <v-row class="m-5 d-flex justify-center">
                    <v-col cols="12" xl="6" lg="6" class="d-flex justify-center">
                        
                    <v-img class="image z-depth-5" :src="photos[0]" @click="index = 0" style="width:350px;height:auto;" :aspect-ratio="16/9"></v-img>
                    <vue-gallery-slideshow :images="photos" :index="index" @close="index = null"></vue-gallery-slideshow>
                    
                    </v-col>
                    
                    <v-col cols="12" xl="6" lg="6">
                        <v-card-text>
                            <div class="display-1">
                                {{ service.name }}
                            </div>

                            <div class="subtitle-1">
                                {{ service.description}}
                            </div>
                    
                            <div class="my-4 subtitle-1">
                                <v-icon>mdi-shape</v-icon>
                                {{ service.category }}
                            </div>

                            <div class="my-4 subtitle-1">
                                <v-icon>mdi-city</v-icon>
                                {{ service.city }}
                            </div>

                            <div class="my-4 subtitle-1">
                                <v-icon>mdi-currency-eur</v-icon>
                                {{ service.price }}
                            </div>

                            <div class="text-center mt-3 pb-5">
                                <v-btn rounded color="yellow darken-2" class="black--text" dark>Objednať</v-btn>
                            </div>
                        </v-card-text>
                    </v-col>
                </v-row>
            
            
               
        
    </v-app>
</template>

<script>

import VueGallerySlideshow from 'vue-gallery-slideshow';

export default {
    components: {
        VueGallerySlideshow
    },

    props: {
        photos: [],
        service: {},  
        reviews: {},
    },
    
data: () => ({
        images: [
            'https://i.pinimg.com/originals/61/e7/8b/61e78b08a8dd18779132812218a9f2a8.jpg',
            'https://i.pinimg.com/originals/1f/87/90/1f8790df8b450fbf5c3b4a6b9db4f822.jpg'
        ],
        index: null,

    }),

    

    created() {
        console.log(this.service);
        console.log(this.photos);
        console.log(this.reviews);
    },

       
};
</script>

<style>
    .image {
        background-size: cover;
        cursor: pointer;
        margin: 5px;
    }

    .vgs__container__img {
        width: 100%;
        height: 100%;
        object-fit: contain !important;
        vertical-align: middle !important;
    }
    
    .vgs__container{
        margin-top: 200px !important;
        background-color: rgba(0, 0, 0, 0) !important;
        
    }
    @media only screen and (max-width: 767px) {
        .vgs__container{
            margin-top: -140px !important;
            object-fit: contain !important;
        }     
        .vgs__container__img {
            object-fit: contain !important;
        }  
    }
</style>


