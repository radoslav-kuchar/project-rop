<template>
<v-app>
   <v-row>
    <v-col cols="3">
        <v-card
            max-width="400"
        >
        <v-card-text>
            <h2 class="title mb-2">
                Vyberte kategóriu
            </h2>

            <h5 class="my-2">
                Administratívne služby
            </h5>

            <v-chip-group
                v-model="amenities"
                column
                multiple
            >
                <v-chip
                filter
                outlined
                >
                Archivácia a ochrana dát
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Spracovanie dát
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Správa registratúry a dokumentov
                </v-chip>
            </v-chip-group>

                <h5 class="my-2">
                    Krása a relax
                </h5>
            <v-chip-group
                v-model="amenities"
                column
                multiple
            >
                <v-chip
                filter
                outlined
                >
                Kaderníctvo/Barber
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Kozmetický salón
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Masáže
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Nechtové štúdium
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Sauna
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Solárium
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Tetovanie a piercing
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Vizážista
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Wellness
                </v-chip>                
            </v-chip-group>
            </v-card-text>

            <v-card-text>
            <h2 class="title my-2">
                Vyberte mesto
            </h2>

            <v-chip-group
                v-model="neighborhoods"
                column
                multiple
            >
                <v-chip
                filter
                outlined
                >
                Bratislava
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Košice
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Prešov
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Poprad
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Nitra
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Žilina
                </v-chip>
            </v-chip-group>
            </v-card-text>

            <v-card-text>
            <h2 class="title my-2">
                Zoradiť podľa
            </h2>

            <v-chip-group
                v-model="neighborhoods"
                column
                multiple
            >
                <v-chip
                filter
                outlined
                >
                Najlacnejšie
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Najdrahšie
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Najnovšie
                </v-chip>
                <v-chip
                filter
                outlined
                >
                Najstaršie
                </v-chip>
            </v-chip-group>
            </v-card-text>
        </v-card>
    </v-col>

    <v-col cols="9" class="mt-5">
        <v-row>
        <v-col cols="4">
            <v-card
            :loading="loading"
            class="mx-auto my-12"
            max-width="374"
        >
            <template slot="progress">
            <v-progress-linear
                color="orange lighten-1"
                height="10"
                indeterminate
            ></v-progress-linear>
            </template>

            <v-img
            height="250"
            src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
            ></v-img>

            <v-card-title>Cafe Badilico</v-card-title>

            <v-card-text>
            <v-row
                align="center"
                class="mx-0"
            >
                <v-rating
                :value="4.5"
                color="amber"
                dense
                half-increments
                readonly
                size="14"
                ></v-rating>

                <div class="grey--text ml-4">
                4.5 (413)
                </div>
            </v-row>

            <div class="my-4 subtitle-1">
                $ • Italian, Cafe
            </div>

            <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
            </v-card-text>

            <v-divider class="mx-4"></v-divider>

            <v-card-title>Tonight's availability</v-card-title>

            <v-card-text>
            <v-chip-group
                v-model="selection"
                active-class="orange lighten-1 white--text"
                column
            >
                <v-chip>5:30PM</v-chip>

                <v-chip>7:30PM</v-chip>

                <v-chip>8:00PM</v-chip>

                <v-chip>9:00PM</v-chip>
            </v-chip-group>
            </v-card-text>

            <v-card-actions>
            <v-btn
                color="orange lighten-1"
                text
                @click="reserve"
            >
                Viac o službe
            </v-btn>
            </v-card-actions>
        </v-card>
        </v-col>

        <v-col cols="4">
            <v-card
            :loading="loading"
            class="mx-auto my-12"
            max-width="374"
        >
            <template slot="progress">
            <v-progress-linear
                color="orange lighten-1"
                height="10"
                indeterminate
            ></v-progress-linear>
            </template>

            <v-img
            height="250"
            src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
            ></v-img>

            <v-card-title>Cafe Badilico</v-card-title>

            <v-card-text>
            <v-row
                align="center"
                class="mx-0"
            >
                <v-rating
                :value="4.5"
                color="amber"
                dense
                half-increments
                readonly
                size="14"
                ></v-rating>

                <div class="grey--text ml-4">
                4.5 (413)
                </div>
            </v-row>

            <div class="my-4 subtitle-1">
                $ • Italian, Cafe
            </div>

            <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
            </v-card-text>

            <v-divider class="mx-4"></v-divider>

            <v-card-title>Tonight's availability</v-card-title>

            <v-card-text>
            <v-chip-group
                v-model="selection"
                active-class="orange lighten-1 white--text"
                column
            >
                <v-chip>5:30PM</v-chip>

                <v-chip>7:30PM</v-chip>

                <v-chip>8:00PM</v-chip>

                <v-chip>9:00PM</v-chip>
            </v-chip-group>
            </v-card-text>

            <v-card-actions>
            <v-btn
                color="orange lighten-1"
                text
                @click="reserve"
            >
                Viac o službe
            </v-btn>
            </v-card-actions>
        </v-card>
        </v-col>
        
        <v-col cols="4">
            <v-card
            :loading="loading"
            class="mx-auto my-12"
            max-width="374"
        >
            <template slot="progress">
            <v-progress-linear
                color="orange lighten-1"
                height="10"
                indeterminate
            ></v-progress-linear>
            </template>

            <v-img
            height="250"
            src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
            ></v-img>

            <v-card-title>Cafe Badilico</v-card-title>

            <v-card-text>
            <v-row
                align="center"
                class="mx-0"
            >
                <v-rating
                :value="4.5"
                color="amber"
                dense
                half-increments
                readonly
                size="14"
                ></v-rating>

                <div class="grey--text ml-4">
                4.5 (413)
                </div>
            </v-row>

            <div class="my-4 subtitle-1">
                $ • Italian, Cafe
            </div>

            <div>Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
            </v-card-text>

            <v-divider class="mx-4"></v-divider>

            <v-card-title>Tonight's availability</v-card-title>

            <v-card-text>
            <v-chip-group
                v-model="selection"
                active-class="orange lighten-1 white--text"
                column
            >
                <v-chip>5:30PM</v-chip>

                <v-chip>7:30PM</v-chip>

                <v-chip>8:00PM</v-chip>

                <v-chip>9:00PM</v-chip>
            </v-chip-group>
            </v-card-text>

            <v-card-actions>
            <v-btn
                color="orange lighten-1"
                text
                @click="reserve"
            >
                Viac o službe
            </v-btn>
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
        loading: false,
        selection: 1,
        }),

        methods: {
        reserve () {
            this.loading = true

            setTimeout(() => (this.loading = false), 2000)
        },
        },
    }
</script>