<template>
    <v-app>
        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="8">
                        <v-card class="elevation-12">
                            <v-window v-model="step">
                                <v-window-item :value="1">
                                    <v-row>
                                        <v-col cols="12" md="8">
                                            <v-card-text class="mt-12">
                                                <h1 class="text-center display-2 teal--text text--accent-3">Prihlásenie</h1>                                                
                                                <h4 class="text-center mlt-4 subtitle-1">Pre prihlásenie zadajte správne údaje</h4>
                                                <v-form>
                                                    <v-text-field
                                                    label="Email"
                                                    name="Email"
                                                    prepend-icon="mdi-email"
                                                    type="text"
                                                    color="teal accent-3"
                                                    :rules="[rules.required, rules.email]"
                                                    hide-details="auto"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    id="password"
                                                    label="Heslo"
                                                    name="Password"
                                                    prepend-icon="mdi-lock"
                                                    type="password"
                                                    color="teal accent-3"
                                                    :rules="[rules.required]"
                                                    hide-details="auto"
                                                    ></v-text-field>  
                                                </v-form>
                                                
                                            </v-card-text>
                                            <h3 class="text-center mt-3 subtitle-1"><a href="#" style="text-decoration:none;color:black;">Zabudli ste heslo?</a></h3>
                                            <div class="text-center mt-3 pb-5">
                                                <v-btn rounded color="teal accent-3" class="black--text" dark>Prihlásiť sa</v-btn>
                                            </div>
                                        </v-col>

                                        <v-col cols="12" md="4" class="teal accent-3">
                                            <v-card-text class="black--text mt-12">
                                                <h1 class="text-center display-1">Vitajte !</h1>
                                                <h5 class="text-center subtitle-1">Zadajte svoje osobné údaje a začnite svoje podnikanie s nami.</h5>
                                            </v-card-text>
                                            <div class="text-center">
                                                <v-btn rounded outlined dark @click="step++" class="black--text">Registrácia</v-btn>
                                            </div>
                                        </v-col>
                                        
                                    </v-row>
                                </v-window-item>
                                <v-window-item :value="2">
                                    <v-row class="fill-height">
                                        <v-col cols="12" md="4" class="teal accent-3">
                                            <v-card-text class="black--text mt-12">
                                                <h1 class="text-center display-1">Vitajte !</h1>
                                                <h5 class="text-center subtitle-1">Prosím, prihláste sa so svojimi osobnými údajmi.</h5>
                                            </v-card-text>
                                            <div class="text-center">
                                                <v-btn rounded outlined dark @click="step--" class="black--text">Prihlásenie</v-btn>
                                            </div>
                                        </v-col>
                                        <v-col cols="12" md="8">
                                            <v-card-text class="mt-12">
                                                <h1 class="text-center display-2 teal--text text--accent-3">Registrácia</h1>
                                                <h4 class="text-center mlt-4 subtitle-1">Pre registráciu vyplňte osobné údaje</h4>
                                                <v-form >
                                                    <v-text-field
                                                    label="Meno užívateľa"
                                                    name="Name"
                                                    prepend-icon="mdi-account"
                                                    type="text"
                                                    color="teal accent-3"
                                                    :rules="[rules.required, rules.length]"
                                                    hide-details="auto"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    label="Email"
                                                    name="Email"
                                                    prepend-icon="mdi-email"
                                                    type="text"
                                                    color="teal accent-3"
                                                    :rules="[rules.required, rules.email]"
                                                    hide-details="auto"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    v-model="password"
                                                    label="Heslo"
                                                    name="Password"
                                                    prepend-icon="mdi-lock"
                                                    :type="show1 ? 'text' : 'password'"
                                                    color="teal accent-3"
                                                    :rules="[rules.required, rules.lengthPassword]"
                                                    hide-details="auto"
                                                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    @click:append="show1 = !show1"
                                                    ></v-text-field>  
                                                    <v-text-field
                                                    v-model="rePassword"
                                                    label="Zopakuj heslo"
                                                    name="Re-Password"
                                                    prepend-icon="mdi-lock"
                                                    :type="show2 ? 'text' : 'password'"
                                                    color="teal accent-3"
                                                    :rules="[passwordConfirmationRule]"
                                                    hide-details="auto"
                                                    :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    @click:append="show2 = !show2"
                                                    ></v-text-field>  
                                                </v-form>
                                            </v-card-text>
                                            <h3 class="text-center mt-3 subtitle-1"><a href="#" style="text-decoration:none;color:black;">Zabudli ste heslo?</a></h3>
                                            <div class="text-center mt-3 pb-5">
                                                <v-btn rounded color="teal accent-3" class="black--text" dark>Zaregistrovať sa</v-btn>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </v-window-item>
                            </v-window>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>


    </v-app>
</template>

<script>
export default {

    data: () => ({
        step: 1,
        show1: false,
        show2: false,
        rules: {
            required: value => !!value || 'Povinné.',
        
            email: value => {
                const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                return pattern.test(value) || 'Neplatný e-mail.'
            },

            length: value => (value && value.length >= 3) || 'Minimálne 3 znaky',

            lengthPassword: value => (value && value.length >= 8) || 'Minimálny počet znakov je 8',

            
        },
        
    }),

    computed: {
        passwordConfirmationRule() {
            return () => (this.password === this.rePassword) || 'Heslá sa nerovnajú.'
        }
    },

    

    props: {
        source: String
    }
    
};
</script>