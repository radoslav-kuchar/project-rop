<template>
    <v-app style="height: 64px;">
        <v-navigation-drawer app fixed v-model="drawer">
            <v-list dense nav>
                <v-list-item v-show="$vuetify.breakpoint.md || $vuetify.breakpoint.sm || $vuetify.breakpoint.xs" v-if="currentUser">
                    <v-list-item-action>
                        <v-icon>mdi-account</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>{{ currentUser.name }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="home">
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

                <v-list-item link @click="blogCreate">
                    <v-list-item-action>
                        <v-icon>mdi-playlist-edit</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Vytvoriť článok</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="blog">
                    <v-list-item-action>
                        <v-icon>mdi-alpha-b-box-outline</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Blog</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="logout" v-show="currentUser">
                    <v-list-item-action>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Odhlásiť sa</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-list-item link @click="login" v-if="$vuetify.breakpoint.md || $vuetify.breakpoint.sm || $vuetify.breakpoint.xs" v-show="!currentUser">
                    <v-list-item-action>
                        <v-icon>mdi-account-arrow-right-outline</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Prihlásenie</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

            </v-list>       
        </v-navigation-drawer>


        <v-app-bar color="yellow accent-4" app >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        

            <v-toolbar-title class="font-weight-medium">iMake</v-toolbar-title>
            <v-spacer></v-spacer>
                      
            

            <div class="d-flex" v-if="currentUser" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">
                <v-avatar color="yellow darken-2" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">
                    <v-icon >
                        mdi-account-circle
                    </v-icon>
                </v-avatar>
                <div class="d-none d-sm-flex flex-row align-center mx-2" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">
                    <div class="flex-column" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">
                        <div class="body-1" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">{{ currentUser.name }}</div>
                        <div class="body-2 font-weight-light" v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl">Prihlásený</div>
                    </div>
                </div>
            </div>

            <a 
            href="/test" 
            v-else style="text-decoration:none;"
            v-show="$vuetify.breakpoint.lg || $vuetify.breakpoint.xl" 
            >
                <div class="d-flex">
                    <v-btn plain>
                        Prihlásenie 
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
                    location.href = '/login';
                }).catch(errors => {
                    console.log(errors.response.data);
                })
            },

            service() {
                location.href = '/service/create'; 
            },

            home() {
                location.href = '/home';
            },

            blog() {
                location.href = '/articles';
            },

            blogCreate() {
                location.href = '/articles/create';
            },

            login() {
                location.href = '/login';
            }
        },

        created() {
            this.getUser()
        },
    };
</script>