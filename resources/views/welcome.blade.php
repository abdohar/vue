<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
        <div id="app">
            
                <div class="alert alert-danger" role="alert" v-bind:class="hasError">
                please fill all fildes
                </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" required placeholder="enter name" v-model="newItem.name">
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="text" name="age" class="form-control" id="age" required placeholder="enter age" v-model="newItem.age">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" name="description" class="form-control" id="description" required placeholder="enter description" v-model="newItem.description">
          </div>
          <div class="form-group">
             <vue-editor/>
          </div>
          <button class="btn btn-primary" @click.prevent="createItem()"> Add </button>  
      


        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="item in items">
      <th scope="row">@{{item.id}}</th>
      <td>@{{item.name}}</td>
      <td>@{{item.age}}</td>
      <td>@{{item.description}}</td>
      <td class="btn btn-danger" @click.prevent="deleteItem(item)">
          delet
      </td>
       <td class="btn btn-primary" @click="showModal=true; setVal(item.id, item.name, item.age, item.description)">
          edit
      </td>
       <td class="btn btn-primary" @click.prevent="pdf()">
          pdf
      </td>
    </tr>
  </tbody>
</table>
 <modal v-if="showModal" @close="showModal = false">
        <h3 slot="header">Edit Item</h3>
        <div slot="body">
           <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="e_name" class="form-control" id="e_name" required placeholder="enter name" :value="e_name">
          </div>
          <div class="form-group">
              <label for="age">Age</label>
              <input type="text" name="e_age" class="form-control" id="e_age" required placeholder="enter age" :value="e_age">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" name="e_description" class="form-control" id="e_description" required placeholder="enter description" :value="e_description">
          </div>
        </div>
        <div slot="footer">
            <button type="button" class="btn btn-primary" @click.prevent="editItem(e_id)" >Update</button>
            <button type="button" class="btn btn-danger"  @click="showModal=false">Close</button>
        </div>
      </modal>
</div>

    </div>
     <script type="text/javascript" src="/js/app.js"></script>
     <script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  default footer
                  <button class="modal-default-button" @click="$emit('close')">
                    OK
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
    </body>
</html>

