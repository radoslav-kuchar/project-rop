<template>
    <v-app>
        <v-row class="m-5 d-flex justify-center">
            <v-col cols="12" xl="6" lg="6" class="d-flex justify-center">
                <v-img class="image" :src="photos[0]" @click="index = 0" ></v-img>
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
                        {{ service.category_name }}
                    </div>

                    <div class="my-4 subtitle-1">
                        <v-icon>mdi-city</v-icon>
                        {{ service.city_name }}
                    </div>

                    <div class="my-4 subtitle-1">
                        <v-icon>mdi-currency-eur</v-icon>
                        {{ service.price }}
                    </div>

                    <div class="text-center mt-3 pb-5">
                        <v-btn rounded color="yellow darken-2" class="black--text" @click="order" dark>Objednať</v-btn>
                    </div>
                </v-card-text>
            </v-col>

        </v-row>
            
        <v-expansion-panels
            v-model="panel"
            expand
        >
            <v-expansion-panel >
                <v-expansion-panel-header class="title">Recenzie</v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-form @submit.prevent="submit">

                            <div class="subtitle">
                                Vaše hodnotenie
                            </div>

                            <v-rating
                                color="yellow darken-3"
                                background-color="yellow darken-2"
                                empty-icon="mdi-star-outline"
                                full-icon="mdi-star"
                                hover
                                length="5"
                                value="0"
                                v-model.number="fields.stars"
                            ></v-rating>

                            <v-textarea
                                label="Text"
                                name="Review"
                                rows="3"
                                color="yellow accent-4"
                                class=""
                                v-model="fields.review"
                            ></v-textarea>  

                            <div class="text-center mt-3 pb-5 d-flex justify-end">
                                <v-btn plain class="black--text" @click="review">Odoslať</v-btn>
                            </div>
                        </v-form>

                        <div class="title mb-2">
                            Recenzie užívateľov
                        </div>

                        <v-row>
                            <v-col cols="12" xl="1" lg="1"  class="justify-center align-center">
                                <v-avatar color="warning lighten-2" class="ml-2">
                                    <span class="white--text headline">PK</span>
                                </v-avatar>
                            </v-col>
                            <v-col cols="12" xl="11" lg="11" class="align-center">
                                <v-rating
                                    color="yellow darken-3"
                                    background-color="yellow darken-2"
                                    empty-icon="mdi-star-outline"
                                    full-icon="mdi-star"
                                    readonly
                                    size="20"
                                    length="5"
                                ></v-rating>
                            
                                <div>
                                    Toto je moja prva recenzia
                                </div>
                                
                            </v-col>
                        </v-row>         
                    </v-expansion-panel-content>
                </v-expansion-panel>
            </v-expansion-panels>
            
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
        index: null,
        panel: [0, 1],
        disabled: false,
        fields: {},
        user_id: {},
        errors: {},


    }),

    methods: {

        order(){
            location.href = '/order/create/'+ this.service.id;
        },

        review(){
            let data = new FormData();
            data.append('review', this.fields.review);
            data.append('stars', this.fields.stars);
            data.append('service_id', this.service.id);
            data.append('user_id', this.user_id.id);

            axios.post('/review', data).then(response => {
                console.log(response.data);
            }).catch(errors => {
                this.errors = errors.response.data.errors
            })
        
        },

        getUser() {
            axios.get('/userinfo').then(response => {
                this.user_id = response.data
            }).catch(errors =>
                console.log(errors)
            )
        },

    },

    created() {
        this.getUser()
        console.log(this.service);
        console.log(this.photos);
        console.log(this.reviews);
        console.log(this.user_id);
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


