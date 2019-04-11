<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Crud VueJs</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <style>
          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Raleway', sans-serif;
              font-weight: 100;
              height: auto;
              margin: 0;
          }
          .full-height {
              min-height: 100vh;
          }
          .flex-center {
              align-items: center;
              display: flex;
              justify-content: center;
          }
          .position-ref {
              position: relative;
          }
          .top-right {
              position: absolute;
              right: 10px;
              top: 18px;
          }
          .content {
          /*  text-align: center; */
          }
          .title {
              font-size: 84px;
          }
          .m-b-md {
              margin-bottom: 30px;
          }
          .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, .5);
            display: table;
            transition: opacity .3s ease;
          }
          .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
          }
          .modal-container {
            width: 300px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
            transition: all .3s ease;
            font-family: Helvetica, Arial, sans-serif;
          }
          .modal-header h3 {
            margin-top: 0;
            color: #42b983;
          }
          .modal-body {
            margin: 20px 0;
          }
        </style>
        
    </head>
    <body>
      <div id="app_vue">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" 
              required v-model="newItem.name" placeholder=" Enter some name">
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" class="form-control" id="age" name="age" 
              required v-model="newItem.age" placeholder=" Enter your age">
        </div>
        <div class="form-group">
          <label for="profession">Profession:</label>
          <input type="text" class="form-control" id="profession" name="profession"
              required v-model="newItem.profession" placeholder=" Enter your profession">
        </div>

        <button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
          <span class="glyphicon glyphicon-plus"></span> ADD
        </button>




      </div>
      
      
    </body>
</html>
