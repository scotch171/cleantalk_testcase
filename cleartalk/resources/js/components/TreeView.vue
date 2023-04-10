<template>
    <ul v-if="this.show">
        <li v-for="slave in slaves" :key="slave.id">
            {{ slave.name }}
            <button @click="slave.show = !slave.show"> {{ slave.show ? '-' : '+'}}</button>
            <tree-view
                v-if="slave.show"
                :id="slave.id"
            />
        </li>
    </ul>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        id: {
            type: Number,
            default: null,
        },
        show: {
            type: Boolean,
            default: true,
        }
    },
    data() {
        return {
            slaves: []
        };
    },
    methods: {
        fetch(){
            axios.get('/api/slaves', {
                params: {
                    id: this.id
                }
            }).then((resp) => {
                this.slaves = resp.data.slaves;
            })
        },
    },
    mounted() {
        this.fetch();
    }
};
</script>
