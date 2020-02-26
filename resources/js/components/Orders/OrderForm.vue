<template>
    <div class="container p-3 bg-white border rounded">
      <h3>Nuevo Pedido</h3>

      <div v-for="commerce in commerces">
        <h3>{{ commerce.name }}</h3> 
        <div v-for="product in commerceOptions.products">
          <h5>{{ product.title }}</h5> 
        </div>
         
      </div>

      <form @submit.prevent="submit">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione Comercio</label>
            <select class="form-control" v-model="commerceOptions" @change="setCodeAndLabelForForm(commerceOptions)">

              <option value="" selected disabled>Comercio</option>
              <option v-for="(commerce, key) in commerces" :value="commerce">
                {{commerce.name}}
              </option>
            </select>
          </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Mesa</label>
          <select class="form-control" v-model="board">

            <option value="" selected disabled>Mesa</option>
            <option v-for="(board, key) in commerceOptions.boards" :value="board.slug">
              {{board.identificable}}
            </option>
          </select>
        </div>  

        <div class="form-group">
            <label for="exampleFormControlSelect1">Producto</label>
            <select class="form-control" v-model="products" multiple="true">
              <option value="" selected disabled>Producto</option>
              <option v-for="(products, key) in commerceOptions.products" :value="products.slug">
                {{products.title}}
              </option>
            </select>
          </div>  

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>


      <div class="mt-5">
        {{commerceOptions}}
        <hr>
        {{commerces}}
        
      </div>
    </div>

</template>

<script>
    export default {
        props: {
          commerces:Array,
        },

        data () {
           return {
             channe:String,
             orders: null,
             number: 2,
             commerceOptions:{},
             board:null,
             products: {},
           }
         },

        methods:{
          changeJobTitle (event) {
            console.log(event.target.options[event.target.options.selectedIndex].value)
            this.productsOptions = event.target.options[event.target.options.selectedIndex].value
            console.log(this.productsOptions);
          },
          setCodeAndLabelForForm(selected) {
            console.log(selected)
          },

          submit() {
            this.errors = {};
            axios.post('/admin/order', { 
              Commerce: this.commerceOptions,
              Board: this.board, 
              Products: this.products
            })
            .then(response => {
              console.log(response)
            }).catch(error => {
              if (error.response.status === 422) {
                this.errors = error.response.data.errors || {};
              }
            });
          },


        },

        mounted() {
            console.clear();
            console.log('mounted order form'+this.commerces);
        }
    }
</script>
