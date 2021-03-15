<template>
    <v-app>
        <v-main>
            <v-container class="fill-height" fluid >
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="8">
                        <v-card class="elevation-12">
                            <v-window v-model="step">
                                <v-window-item :value="1">
                                    <v-row>
                                        <v-col cols="12" md="8">
                                            <v-card-text class="mt-12">
                                                <h1 class="text-center display-2 yellow--text text--accent-4">Prihlásenie</h1>                                            
                                                <h4 class="text-center mlt-4 subtitle-1">Pre prihlásenie zadajte správne údaje</h4>
                                                <v-form @submit.prevent="submit" id="check-login-form">
                                                    <v-text-field
                                                    label="Email"
                                                    name="Email"
                                                    prepend-icon="mdi-email"
                                                    type="text"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required, rules.email]"
                                                    :error-messages="errorsl.email"
                                                    hide-details="auto"
                                                    v-model="fieldsl.email"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    id="password"
                                                    label="Heslo"
                                                    name="Password"
                                                    prepend-icon="mdi-lock"
                                                    type="password"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required]"
                                                    :error-messages="errorsl.password"
                                                    hide-details="auto"
                                                    v-model="fieldsl.password"
                                                    ></v-text-field>  
                                                </v-form>
                                                
                                            </v-card-text>
                                            <h3 class="text-center mt-3 subtitle-1"><a href="#" style="text-decoration:none;color:black;">Zabudli ste heslo?</a></h3>
                                            <div class="text-center mt-3 pb-5">                                                
                                                <v-btn type="submit" rounded color="yellow accent-4" class="black--text" dark form="check-login-form" @click="doLogin">Prihlásiť sa</v-btn>
                                            </div>
                                        </v-col>

                                        <v-col cols="12" md="4" class="yellow accent-4">
                                            <v-card-text class="black--text mt-12">
                                                <h1 class="text-center display-1">Vitajte !</h1>
                                                <h5 class="text-center subtitle-1">Zadajte svoje osobné údaje a začnite svoje podnikanie s nami.</h5>
                                            </v-card-text>
                                            <div class="text-center mb-5">
                                                <v-btn rounded outlined dark @click="step++" class="black--text">Registrácia</v-btn>
                                            </div>
                                        </v-col>
                                        
                                    </v-row>
                                </v-window-item>
                                <v-window-item :value="2">
                                    <v-row class="fill-height">
                                        <v-col cols="12" md="4" class="yellow accent-4">
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
                                                
                                                <h1 class="text-center display-2 yellow--text text--accent-4">Registrácia</h1>
                                                <h4 class="text-center mlt-4 subtitle-1">Pre registráciu vyplňte osobné údaje</h4>
                                                <v-alert type="success" v-show="success_register" timeout="-1">Vaša registrácia prebehla úspešne!</v-alert>
                                                <v-form ref="form">
                                                    <v-text-field
                                                    label="Meno užívateľa"
                                                    name="Name"
                                                    prepend-icon="mdi-account"
                                                    type="text"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required, rules.length]"
                                                    :error-messages="errorsr.name"
                                                    hide-details="auto"
                                                    v-model="fieldsr.name"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    label="Email"
                                                    name="Email"
                                                    prepend-icon="mdi-email"
                                                    type="text"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required, rules.email]"
                                                    :error-messages="errorsr.email"
                                                    hide-details="auto"
                                                    v-model="fieldsr.email"
                                                    ></v-text-field>
                                                    <v-text-field
                                                    label="Heslo"
                                                    name="Password"
                                                    prepend-icon="mdi-lock"
                                                    :type="show1 ? 'text' : 'password'"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required, rules.lengthPassword]"
                                                    :error-messages="errorsr.password"
                                                    hide-details="auto"
                                                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    @click:append="show1 = !show1"                                                    
                                                    v-model="fieldsr.password"
                                                    ></v-text-field>  
                                                    <v-text-field
                                                    label="Zopakuj heslo"
                                                    name="Re-Password"
                                                    prepend-icon="mdi-lock"
                                                    :type="show2 ? 'text' : 'password'"
                                                    color="yellow accent-4"
                                                    :rules="[passwordConfirmationRule]"
                                                    :error-messages="errorsr.rePassword"
                                                    hide-details="auto"
                                                    :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    @click:append="show2 = !show2"                                                    
                                                    v-model="fieldsr.rePassword"
                                                    ></v-text-field>  
                                                </v-form>
                                            </v-card-text>
                                            <h3 class="text-center mt-3 subtitle-1"><a href="#" style="text-decoration:none;color:black;">Zabudli ste heslo?</a></h3>
                                            <div class="text-center mt-3 pb-5">
                                                <v-btn rounded color="yellow accent-4" class="black--text" dark @click="doRegister">Zaregistrovať sa</v-btn>
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
        fieldsr: {},
        fieldsl: { 
            email: '',
            password: '',
            device_name: 'browser'
        },
        success: false,
        error: false,    
        success_register: false,
        errorsl: {},
        errorsr: {},
        

        
    }),

    computed: {
        passwordConfirmationRule() {
            return () => (this.fieldsr.password === this.fieldsr.rePassword) || 'Heslá sa nerovnajú.'
        }
    },

    methods: {
        doLogin() {
            axios.post("login", this.fieldsl).then( response => {
                console.log(response.data)
                localStorage.setItem('accessToken', response.data.accessToken)
                location.href = '/home';
            }).catch( errors => {
                this.errorsl = errors.response.data.errors
                this.success = false
            }) 
        },
        doRegister() {
            axios.post("api/register", this.fieldsr).then( response => {
                console.log(response.data)
                this.success_register = true
                this.$refs.form.reset()
                this.$refs.form.resetValidation()
            }).catch( errors => {
                this.errorsr = errors.response.data.errors
                this.success_register = false
            }) 
        }
    },

    props: {
        source: String
    }
    
};
</script>