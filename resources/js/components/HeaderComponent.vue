<template>
    <v-app style="height: 64px;">
        <v-navigation-drawer app fixed v-model="drawer">
            <v-list dense nav>
                <v-list-item>
                    <v-list-item-action>
                        <v-icon>mdi-home</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Home</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item>
                    <v-list-item-action>
                        <v-icon>mdi-help-circle</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>About</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="logout">
                    <v-list-item-action>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Sign Out</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

            </v-list>       
        </v-navigation-drawer>


        <v-app-bar color="orange lighten-1" app dark>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        

            <v-toolbar-title class="font-weight-medium" >Sprostredkovanie služieb</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items v-show="loggedOut">
                <v-btn text>Login</v-btn>
                <v-btn text>Register</v-btn>
            </v-toolbar-items>

            <div class="d-flex" v-show="loggedIn">
                <v-avatar>
                <img :src="'https://stevensegallery.com/100/100/?rand=' + Math.random()" />
                </v-avatar>
                <div class="d-none d-sm-flex flex-row align-center mx-2">
                    <div class="flex-column">
                        <div class="body-1">{{ currentUser.name }}</div>
                        <div class="body-2 font-weight-light">Prihlásený</div>
                    </div>
                </div>
            </div>
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
            token: localStorage.getItem('token'),
        }),

        watch: {
            group () {
                this.drawer = false
            },
        },

        methods: {
            getUser() {
                axios.get('/api/user').then(response => {
                this.currentUser = response.data
                console.log(this.currentUser)
            }).catch(errors =>
                console.log(errors)
            )
            },

            logout() {
                axios.post("/api/logout").then(response =>{
                    localStorage.removeItem('token');
                    this.$router.push('/login')
                }).catch(errors => {
                    console.log(errors.response.data);
                })
            }
        },

        created() {
            axios.defaults.headers.common["Authorization"] = `Bearer ${this.token}`;
            this.getUser()
        },
    };
</script>