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
                                                <h1 class="text-center display-2 yellow--text text--accent-4">Vytvorenie článku</h1>                                            
                                                <h4 class="text-center mlt-4 subtitle-1">Vyplňte podrobné údaje o vašom článku.</h4>
                                                <v-form @submit.prevent="submit">
                                                    <v-text-field
                                                    label="Názov článku"
                                                    name="Nazov"
                                                    prepend-icon="mdi-form-textbox"
                                                    type="text"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required]"
                                                    :error-messages="errors.name"
                                                    hide-details="auto"
                                                    v-model="fields.title"
                                                    class="mb-5"
                                                    ></v-text-field>
                                                    <v-select
                                                    prepend-icon="mdi-shape"
                                                    :items="categories"
                                                    color="yellow accent-4"
                                                    label="Vyberte kategóriu"
                                                    :rules="[rules.required]"
                                                    v-model="fields.category"
                                                    :error-messages="errors.category"
                                                    ></v-select>
                                                    <v-textarea
                                                    label="Obsah článku"
                                                    name="Popis"
                                                    prepend-icon="mdi-image-text"
                                                    rows="15"
                                                    color="yellow accent-4"
                                                    :rules="[rules.required]"
                                                    :error-messages="errors.description"
                                                    hide-details="auto"
                                                    v-model="fields.content"
                                                    class="mb-5"
                                                    ></v-textarea>  
                                                </v-form>
                                                
                                            </v-card-text>
                                            <div class="text-center mt-3 pb-5">                                                
                                                <v-btn type="submit" rounded color="yellow accent-4" class="black--text" dark form="check-login-form" @click="doArticle">Vytvoriť</v-btn>
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
            rules: {
                required: value => !!value || 'Povinné.',
            },
            fields: {},
            success: false,
            errors: {},
            categories: [
                'General',
            ],

        }),

        methods: {
            doArticle() {
                let data = new FormData();
                data.append('title', this.fields.title);
                data.append('content', this.fields.content);
                data.append('article_category_id', 1);
                
                axios.post('/blog/post', data).then(response => {
                    location.href = '/blog';
                    console.log(response.data);
                    //console.log(this.fields.photos);
                }).catch(errors => {
                    this.errors = errors.response.data.errors
                })
            }
        },

        created() {
            
        }
    }
</script>