<template>
    <v-app>
        <v-main>
            <v-container class="fill-height" fluid >
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="8">
                        <v-card class="elevation-12">
                            <v-window>
                                <v-window-item>
                                    <v-row>
                                        <v-col cols="12" >
                                            <v-card-text class="mt-12">
                                                <h1 class="text-center display-2 orange--text text--lighten-1">Vytvorenie služby</h1>                                            
                                                <h4 class="text-center mlt-4 subtitle-1">Vyplňte podrobné údaje o vašej službe.</h4>
                                                <v-form @submit.prevent="submit">
                                                    <v-text-field
                                                    label="Názov služby"
                                                    name="Nazov"
                                                    prepend-icon="mdi-form-textbox"
                                                    type="text"
                                                    color="orange lighten-1"
                                                    :rules="[rules.required]"
                                                    :error-messages="errors.name"
                                                    hide-details="auto"
                                                    v-model="fields.name"
                                                    class="mb-5"
                                                    ></v-text-field>
                                                    <v-textarea
                                                    label="Popis služby"
                                                    name="Popis"
                                                    prepend-icon="mdi-image-text"
                                                    rows="3"
                                                    color="orange lighten-1"
                                                    :rules="[rules.required]"
                                                    :error-messages="errors.description"
                                                    hide-details="auto"
                                                    v-model="fields.description"
                                                    class="mb-5"
                                                    ></v-textarea>  
                                                    <v-text-field
                                                    label="Cena služby"
                                                    name="Cena"
                                                    prepend-icon="mdi-currency-eur"
                                                    type="text"
                                                    color="orange lighten-1"
                                                    :rules="[rules.required]"
                                                    :error-messages="errors.price"
                                                    hide-details="auto"
                                                    v-model="fields.price"
                                                    class="mb-5"
                                                    ></v-text-field>
                                                    <v-select
                                                    prepend-icon="mdi-shape"
                                                    :items="categories"
                                                    color="orange lighten-1"
                                                    label="Vyberte kategoriu"
                                                    :rules="[rules.required]"
                                                    v-model="fields.category"
                                                    :error-messages="errors.category"
                                                    ></v-select>
                                                    <v-select
                                                    prepend-icon="mdi-city"
                                                    :items="places"
                                                    color="orange lighten-1"
                                                    label="Vyberte miesto služby"
                                                    :rules="[rules.required]"
                                                    v-model="fields.city"
                                                    :error-messages="errors.city"
                                                    ></v-select>
                                                    <v-file-input
                                                        label="Pridajte fotografie"
                                                        multiple
                                                        prepend-icon="mdi-camera"
                                                        id="photos"  
                                                        v-model="fields.photos"                                                  
                                                    ></v-file-input>
                                                </v-form>
                                                
                                            </v-card-text>
                                            <div class="text-center mt-3 pb-5">                                                
                                                <v-btn type="submit" rounded color="orange lighten-1" class="black--text" dark form="check-login-form" @click="doService">Vytvoriť</v-btn>
                                            </div>
                                        </v-col>   
                                    </v-row>
                                </v-window-item>
                            </v-window>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>


    </v-app>
</template>

<script>
export default {

    data: () => ({
        categories: [
        'Archivácia a ochrana dát',
        'Spracovanie dát',
        'Správa registratúry a dokumentov',
        'Kaderníctvo/Barber',
        'Kozmetický salón',
        'Masáže',
        'Nechtové štúdium',
        'Sauna',
        'Solárium',
        'Tetovanie a piercing',
        'Vizážista',
        'Wellness',
        ],
        places: [
        'Bratislava',
        'Košice',
        'Poprad',
        'Prešov',
        'Nitra',
        'Žilina',
        ],
        rules: {
            required: value => !!value || 'Povinné.',

            //length: value => (value && value.length >= 3) || 'Minimálne 3 znaky',

            //lengthPassword: value => (value && value.length >= 8) || 'Minimálny počet znakov je 8',

            
        },
        fields: {},
        success: false,
        errors: {},

        
    }),

    methods: {
        doService() {
            let data = new FormData();
            data.append('name', this.fields.name);
            data.append('description', this.fields.description);
            data.append('city', this.fields.city);
            data.append('category', this.fields.category);
            data.append('price', this.fields.price);

            var totalfiles = document.getElementById('photos').files.length;
            for (var index = 0; index < totalfiles; index++) {
                data.append("photos[]", document.getElementById('photos').files[index]);
            }
            
            axios.post('/service', data).then(response => {
                //location.href = '/testhome';
                console.log(response.data);
                //console.log(this.fields.photos);
            }).catch(errors => {
                console.log(errors);
                this.errors = errors.response.data.errors
            })
        }
        
    },

    props: {
        source: String
    }
    
};
</script>