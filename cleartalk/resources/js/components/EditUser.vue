<template>
    <div v-if="user">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Имя</span>
            </div>
            <input class="form-control" type="text" v-model="user.name">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Фамилия</span>
            </div>
            <input class="form-control" type="text" v-model="user.s_name">

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Телефон</span>
            </div>
            <input class="form-control" type="text" v-model="user.phone">

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Должность</span>
            </div>
            <input class="form-control" type="text" v-model="user.job_title">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">email</span>
            </div>
            <input class="form-control" type="text" v-model="user.email">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">id начальника</span>
            </div>
            <input class="form-control" type="text" v-model="user.boss_id">
        </div>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Заметки</span>
            </div>
            <textarea class="form-control" v-model="user.notes"></textarea>
        </div>

        <button @click="save">Сохранить</button>



    </div>
    <div v-else-if="notFound">
        <h1>Пользовательно не найден</h1>
    </div>
</template>

<script>
export default {
    name: "EditUser",
    props: {
        id: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            user: null,
            notFound: false,
        }
    },
    mounted() {
        axios.get(`/api/users/${this.id}`)
            .then((resp) => {
                if (resp.status === 200) {
                    this.user = resp.data.user
                } else {

                }
            });
    },
    methods: {
        save() {
            axios.put(`/api/users/${this.id}`, {
                params: {
                    data: this.user,
                }
            })
                .then((res) => {
                    
                })
        }
    }
}
</script>

<style scoped>

</style>
