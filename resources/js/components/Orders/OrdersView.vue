<template>
    <div class="container mt-5 p-3 bg-white border rounded">
      <v-sheet
          color="#f5f5f5"
          class="px-3 pt-3 pb-3"
        >
          <v-skeleton-loader
            class="mx-auto"
            max-width="300"
            type="card"
          ></v-skeleton-loader>
        </v-sheet>
        <div >
            <h3>Lista de Pedidos</h3>
            <div class="container-fluid mt-3">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Mesa</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Tiempo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(order, i) in orders" class="bg-success" v-if="i == 0" style="color:white !important">
                        <td>{{ order.slug }}</td>
                        <td>{{ order.user.name }} {{ order.user.lastname }}</td>

                        <td>{{ order.board.id }} </td>
                        <td>{{ order.items.length }} </td>
                        <td>{{ order.totalPrice }} </td>
                        <td>
                          <timeago :datetime="order.created_at" :auto-update="60"></timeago>
                        </td>
                      </tr>
                      <tr v-else>
                        <td>{{ order.slug }}</td>
                        <td>{{ order.user.name }} {{ order.user.lastname }}</td>

                        <td>{{ order.board.id }} </td>
                        <td>{{ order.items.length }} </td>
                        <td>{{ order.totalPrice }} </td>
                        <td>
                          <timeago :datetime="order.created_at" :auto-update="60"></timeago>
                        </td>
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
             channe:String,
             orders: null,
             number: 2,
           }
         },

        methods:{


        },

        mounted() {
            console.clear();
            this.channel = 'order-of-'+this.commerce
            console.log(this.channel);
            Echo.channel(this.channel) //Should be Channel Name        
            .listen('OrderShipped', (data) => {
              console.log(data);
                axios
                  .get('http://websocketprueba.test/api/ordenes/'+this.commerce)
                  .then(response => (
                    console.log(response.data.result),
                    this.orders = response.data.result
                  ))       
            });

            axios
                  .get('http://websocketprueba.test/api/ordenes/'+this.commerce)
                  .then(response => (
                    console.log(response.data.result),
                    this.orders = response.data.result
                  ))
        }
    }
</script>
