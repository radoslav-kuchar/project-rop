<template>
    <v-app>
        <v-row>
            <v-col cols="12" lg="3" md="12">
                
                <v-expansion-panels
                v-model="panel"
                v-show="$vuetify.breakpoint.md || $vuetify.breakpoint.sm || $vuetify.breakpoint.xs"
                >
                    <v-expansion-panel >
                        <v-expansion-panel-header>Filter služieb</v-expansion-panel-header>
                        
                        <v-expansion-panel-content>    
                                <v-card-text>
                                    <h5 class="my-2">
                                        Administratívne služby
                                    </h5>

                                    <v-chip-group
                                        column
                                        multiple
                                    >
                                        <v-chip
                                        filter
                                        outlined
                                        v-for="admin in admins"
                                        :key="admin"
                                        >
                                        {{ admin }}
                                        </v-chip>
                                    </v-chip-group>

                                    <h5 class="my-2">
                                        Krása a relax
                                    </h5>
                                    <v-chip-group
                                        column
                                        multiple
                                    >
                                        <v-chip
                                        filter
                                        outlined
                                        v-for="relax in relaxes"
                                        :key="relax"
                                        >
                                        {{ relax }}
                                        </v-chip>                
                                        </v-chip-group>
                                </v-card-text>

                                <v-card-text>
                                    <h2 class="title my-2">
                                        Vyberte mesto
                                    </h2>

                                    <v-chip-group
                                        column
                                        multiple
                                    >
                                        <v-chip
                                        filter
                                        outlined
                                        v-for="city in cities"
                                        :key="city"
                                        >
                                        {{ city }}
                                        </v-chip>
                                    </v-chip-group>
                                </v-card-text>

                                <v-card-text>
                                    <h2 class="title my-2">
                                        Zoradiť podľa
                                    </h2>

                                    <v-chip-group
                                        column
                                    >
                                        <v-chip
                                        filter
                                        outlined
                                        v-for="sort in sorts"
                                        :key="sort"
                                        >
                                        {{ sort }}
                                        </v-chip>
                            
                                    </v-chip-group>
                                </v-card-text>

                                <div class="text-center mt-3 pb-5">
                                    <v-btn rounded color="white" class="black--text" dark>Filtrovať</v-btn>
                                </div>
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>

                <v-card v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">      
                    <v-card-text>
                        <h5 class="my-2">
                            Administratívne služby
                        </h5>

                        <v-chip-group
                            column
                            multiple
                        >
                            <v-chip
                            filter
                            outlined
                            v-for="admin in admins"
                            :key="admin"
                            >
                            {{ admin }}
                            </v-chip>
                        </v-chip-group>

                        <h5 class="my-2">
                            Krása a relax
                        </h5>
                        <v-chip-group
                            column
                            multiple
                        >
                            <v-chip
                            filter
                            outlined
                            v-for="relax in relaxes"
                            :key="relax"
                            >
                            {{ relax }}
                            </v-chip>                
                            </v-chip-group>
                    </v-card-text>

                    <v-card-text>
                        <h2 class="title my-2">
                            Vyberte mesto
                        </h2>

                        <v-chip-group
                            column
                            multiple
                        >
                            <v-chip
                            filter
                            outlined
                            v-for="city in cities"
                            :key="city"
                            >
                            {{ city }}
                            </v-chip>
                        </v-chip-group>
                    </v-card-text>

                    <v-card-text>
                        <h2 class="title my-2">
                            Zoradiť podľa
                        </h2>

                        <v-chip-group
                            column
                        >
                            <v-chip
                            filter
                            outlined
                            v-for="sort in sorts"
                            :key="sort"
                            >
                            {{ sort }}
                            </v-chip>
                
                        </v-chip-group>
                    </v-card-text>

                    <div class="text-center mt-3 pb-5">
                        <v-btn rounded color="white" class="black--text" dark>Filtrovať</v-btn>
                    </div>
                </v-card>     
                
            </v-col>  
            
            

            <v-col cols="12" lg="9" md="12">
                <v-row class="mt-3" >
                    <v-col cols="12" lg="4" md="4" sm="6"  v-for="service in services" :key="service.id">
                        <v-card
                        class="mx-10 my-12"
                        max-width="auto"
                        >
                            <a v-bind:href=" '/service/' + service.id ">
                                <v-img
                                :aspect-ratio="16/9"
                                :src=" service.path[0]  "
                                ></v-img>
                            </a>
        
                            <a href="#" style="text-decoration:none; color:black;">
                                <v-card-title style="word-break: normal;">{{ service.name }}</v-card-title>
                            </a>

                            <v-card-text>
                                <v-row
                                    align="center"
                                    class=" mb-3"
                                >
                                    <v-rating
                                    :value="4.5"
                                    color="amber"
                                    half-increments
                                    readonly
                                    size="20"
                                    ></v-rating>

                                    <div class="grey--text ml-4">
                                    (413)
                                    </div>
                                </v-row>

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

                                <div class="my-4 subtitle-1">
                                    <v-icon>mdi-account</v-icon>
                                    {{ service.user.name }}
                                </div>

                            </v-card-text>

                            <v-divider class="mx-4"></v-divider>

                                

                            <v-card-actions>
                                <a v-bind:href=" '/service/' + service.id ">
                                    <v-btn
                                        color="yellow accent-4"
                                        text
                                    >
                                        Viac o službe
                                    </v-btn>
                                </a>
                            </v-card-actions>
                        </v-card>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>  

    </v-app>
</template>

<script>
    export default {
        data: () => ({
            selection: 1,
            services: [],
            index: 0,
            panel: [0, 1],
            admins: [
                "Archivácia a ochrana dát",
                "Spracovanie dát",
                "Správa registratúry a dokumentov",
            ],
            relaxes: [
                "Kaderníctvo/Barber",
                "Kozmetický salón",
                "Masáže",
                "Nechtové štúdium",
                "Sauna",
                "Solárium",
                "Tetovanie a piercing",
                "Vizážista",
                "Wellness",
            ],
            cities: [
                "Bratislava",
                "Košice",
                "Prešov",
                "Poprad",
                "Nitra",
                "Žilina",
            ],
            sorts: [
                "Najlacnejšie",
                "Najdrahšie",
                "Najnovšie",
                "Najstaršie",
            ],
            filter: '',
            value: 1,

        }),

        methods: {
            getService() {
                axios.get('/services').then(response => {
                    this.services = response.data
                }).catch(errors =>
                    console.log(errors)
                )
            }
        },

        created() {
            this.getService()
            console.log(this.filter)
        }
    }
</script>