<template>
    <div class="container mt-5 p-3 bg-white border rounded">
      
        <div >
            <h3>Lista de Productos</h3>
            <div class="container-fluid mt-3">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(product, i) in products">
                        <td class="border border-success" v-if="i == 0" style="color:red;">{{ product.title }}</td>
                        <td v-else>{{ product.title }}</td>


                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
          commerce: String,
        },

        data () {
           return {
             products: null,
             number: 2,
           }
         },

        methods:{


        },

        mounted() {
            console.clear();
            console.log('Component mounted.'+this.commerce);
            Echo.channel('home') //Should be Channel Name        
            .listen('NewMessage', (data) => {       
            });
        }
    }
</script>
