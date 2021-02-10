<template>
    <v-app style="height: 64px;">
        <v-navigation-drawer app fixed v-model="drawer">
            <v-list dense nav>
                <v-list-item>
                    <v-list-item-action>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Domov</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="service">
                    <v-list-item-action>
                        <v-icon>mdi-archive-arrow-up-outline</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Vytvoriť službu</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="logout">
                    <v-list-item-action>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Odhlásiť sa</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

            </v-list>       
        </v-navigation-drawer>


        <v-app-bar color="orange lighten-1" app dark>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        

            <v-toolbar-title class="font-weight-medium">Sprostredkovanie služieb</v-toolbar-title>
            <v-spacer></v-spacer>           
            

            <div class="d-flex" v-if = currentUser.name>
                <v-avatar color="orange">
                    <v-icon dark>
                        mdi-account-circle
                    </v-icon>
                </v-avatar>
                <div class="d-none d-sm-flex flex-row align-center mx-2">
                    <div class="flex-column">
                        <div class="body-1">{{ currentUser.name }}</div>
                        <div class="body-2 font-weight-light">Prihlásený</div>
                    </div>
                </div>
            </div>

            <a href="/test" v-else style="text-decoration:none;">
                <div class="d-flex">
                    <v-btn plain>
                        Prihlásenie / Registrácia
                    </v-btn>
                </div>
            </a>

        </v-app-bar>

        
    </v-app>
            
      
    
</template>

<script>
    export default {
        data: () => ({
            drawer: false,
            group: null,
            loggedOut: false,
            loggedIn: false,
            currentUser: {},
            token: localStorage.getItem('accessToken'),
        }),

        watch: {
            group () {
                this.drawer = false
            },
        },

        methods: {
            getUser() {
                axios.get('/userinfo').then(response => {
                    this.currentUser = response.data
                }).catch(errors =>
                    console.log(errors)
                )
            },

            logout() {
                axios.post("/logout").then(response =>{
                    localStorage.removeItem('token');
                    location.href = '/test';
                }).catch(errors => {
                    console.log(errors.response.data);
                })
            },

            service() {
                location.href = '/testservice';
                
            }
        },

        created() {
            axios.defaults.headers.common["Authorization"] = `Bearer ${this.token}`;
            this.getUser()
        },
    };
</script>