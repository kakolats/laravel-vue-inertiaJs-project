<template>
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                </div>
                                <form @submit.prevent="login" class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp"
                                               placeholder="Entrez votre adresse mail" v-model="form.email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Mot de passe"
                                                v-model="form.password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" title="Se connecter">

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Créer un compte ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {usePage} from "@inertiajs/vue3";

const form = useForm({
    email:"",
    password:""
})

const login = () => {
    form.post('/login');
}
</script>

<script>
import AuthLayout from '../../Layouts/Auth/AuthLayout.vue'
export default{
    layout: AuthLayout
}
</script>
