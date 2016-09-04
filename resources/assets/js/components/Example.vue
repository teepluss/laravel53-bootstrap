<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>
                    <div class="panel-body">
                        <h3 v-if="user">Welcome {{ user.name }}, you are logged in!</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        ready() {
            console.log(this.user)
        }
    }
</script>
