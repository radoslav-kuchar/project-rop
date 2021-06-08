<template>
    <v-app>
        <v-alert type="success" v-show="success_order" timeout="-1">Objednávka bola úspešná!</v-alert>

        <v-stepper
            v-model="e6"
            vertical
        >
            <v-stepper-step
            :complete="e6 > 1"
            step="1"
            color="yellow accent-4"
            >
            Kontaktné údaje
            </v-stepper-step>

            <v-stepper-content step="1">
                <v-form @submit.prevent="submit">
                    <v-text-field
                    label="Meno"
                    name="Meno"
                    prepend-icon="mdi-form-textbox"
                    type="text"
                    color="yellow accent-4"
                    :rules="[rules.required]"
                    :error-messages="errors.fName"
                    hide-details="auto"
                    v-model="fields.fName"
                    class="mb-5"
                    ></v-text-field>  
                    <v-text-field
                    label="Priezvisko"
                    name="Priezvisko"
                    prepend-icon="mdi-form-textbox"
                    type="text"
                    color="yellow accent-4"
                    :rules="[rules.required]"
                    :error-messages="errors.lName"
                    hide-details="auto"
                    v-model="fields.lName"
                    class="mb-5"
                    ></v-text-field>  
                    <v-text-field
                    label="Email"
                    name="Email"
                    prepend-icon="mdi-email-outline"
                    type="text"
                    color="yellow accent-4"
                    :rules="[rules.required,rules.email]"
                    :error-messages="errors.email"
                    hide-details="auto"
                    v-model="fields.email"
                    class="mb-5"
                    ></v-text-field>  
                    <v-text-field
                    label="Telefónne číslo"
                    name="TelCislo"
                    prepend-icon="mdi-phone-outline"
                    type="text"
                    color="yellow accent-4"
                    :rules="[rules.required,rules.number,rules.length]"
                    :error-messages="errors.phone"
                    hide-details="auto"
                    v-model="fields.phone"
                    class="mb-5"
                    ></v-text-field>  
                </v-form>
                <v-btn
                    color="yellow accent-4"
                    @click="e6 = 2"
                    
                >
                    Pokračovať
                </v-btn>
            </v-stepper-content>

            <v-stepper-step
            :complete="e6 > 2"
            step="2"
            color="yellow accent-4"
            >
            Termín
            </v-stepper-step>

            <v-stepper-content step="2">
                <v-card
                    color="grey lighten-1"
                    class="mb-12"
                    height="200px"
                ></v-card>
                <v-btn
                    color="yellow accent-4"
                    @click="e6 = 3"
                >
                    Pokračovať
                </v-btn>
                <v-btn
                    @click="e6 = 1"
                >
                    Krok späť
                </v-btn>
            </v-stepper-content>

            <v-stepper-step
            :complete="e6 > 3"
            step="3"
            color="yellow accent-4"
            >
            Platba
            </v-stepper-step>

            <v-stepper-content step="3">
                <v-checkbox
                v-model="checkbox1"
                :label="'Platba v hotovosti'"
                color="yellow accent-4"
                ></v-checkbox>

                <v-checkbox
                v-model="checkbox2"
                :label="'Platba kartou'"
                color="yellow accent-4"
                ></v-checkbox>
                <v-btn
                    color="yellow accent-4"
                    @click="e6 = 4"
                >
                    Pokračovať
                </v-btn>
                <v-btn
                    @click="e6 = 2"
                >
                    Krok späť
                </v-btn>
            </v-stepper-content>

            <v-stepper-step step="4" color="yellow accent-4">
            Všeobecné obchodné podmienky
            </v-stepper-step>
            <v-stepper-content step="4">
                <v-checkbox
                v-model="checkbox2"
                :label="'Súhlasím so všeobecnými obchodnými podmienkami'"
                color="yellow accent-4"
                :rules="[rules.required]"
                ></v-checkbox>
                <v-btn
                    color="yellow accent-4"
                    @click="order"
                >
                    Objednať
                </v-btn>
                <v-btn
                    @click="e6 = 3"
                >
                    Krok späť
                </v-btn>
            </v-stepper-content>
        </v-stepper>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            e6: 1,
            rules: {
                required: value => !!value || 'Povinné.',
                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Neplatný e-mail.'
                },
                number: value => Number.isInteger(Number(value)) || "Zadaná hodnota musí byť číslo.",
                length: value => (value && value.length == 10) || 'Zadajte číslo vo formáte 0912345678',

            },
            fields: {},
            success: false,
            errors: {},
            checkbox1: false,
            checkbox2: false,
            success_order: false,
        }),

        methods: {

            order(){
                let data = new FormData();
                data.append('fName', this.fields.fName);
                data.append('lName', this.fields.lName);
                data.append('email', this.fields.email); //foreach pri selecte
                data.append('phone', this.fields.phone);
                data.append('service_id', this.service.id);

                axios.post('/order', data).then(response => {
                    this.success_order = true;
                    location.href = '/home';
                    console.log(response.data);
                    //console.log(this.fields.photos);
                }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            }
        },

        created() {
            
        },

        props: {
            service: {}
        }
    }
</script>