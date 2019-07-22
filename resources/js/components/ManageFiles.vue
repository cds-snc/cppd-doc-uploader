<template>
    <div class="container">
        <h1>Documents inbox</h1>

        <table class="table">
            <tr>
                <th></th>
                <th>File</th>
                <th>Uploaded</th>
                <th></th>
            </tr>
            <tr v-for="(file, index) in uploaded_files" v-bind:key="index">
                <td>{{ index+1 }}</td>
                <td>{{ file.name }}</td>
                <td>{{ file.date }}</td>
                <td class="text-right">
                    <a :href="file.url" class="btn btn-default">Download</a>
                    
                    <button class="btn btn-danger" @click="deleteFile(file.name)">Delete</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['files'],
        data: function() {
            return {
                uploaded_files: []
            }
        },
        mounted () {
            this.uploaded_files = JSON.parse(this.files)
        },
        methods: {
            deleteFile(file) {
                const url = `/files/${file}`;
                
                axios.delete(url)
                    .then(function(data) {
                        window.location.reload();
                    });
            }
        }
    }
</script>

<style scoped>
    .delete-form {
        display: inline;
    }
</style>
