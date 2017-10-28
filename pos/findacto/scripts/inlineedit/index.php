<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>inline editing with jquery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

<script src="//code.jquery.com/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      .container {
  margin-top: 15px;
}

#save-about, #cancel-about, #save-skills, #cancel-skills, .info {
  display: none;
}

.info {
  color: #999;
}

textarea {
  width: 100%;
  min-height: 100px;
  resize: vertical;
  margin: 0;
  padding: 2px;
}
    </style>


</head>

<body>
  <div class="container">
  <h1>inline editing <small>with jquery & textareas</small></h1>
  <table class="table table-bordered">
    <tbody>
      <tr>
        <td class="about">1</td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-info" id="edit-about"><span class="glyphicon glyphicon-edit"></span> edit</button>
  <button class="btn btn-success" id="save-about"><span class="glyphicon glyphicon-ok"></span> save</button>
  <button class="btn btn-cancel" id="cancel-about"><span class="glyphicon glyphicon-remove"></span> cancel</button>

  <table class="table table-bordered">
    <tbody>
      <tr>
        <td class="skills">1</td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-info" id="edit-skills"><span class="glyphicon glyphicon-edit"></span> edit</button>
  <button class="btn btn-success" id="save-skills"><span class="glyphicon glyphicon-ok"></span> save</button>
  <button class="btn btn-cancel" id="cancel-skills"><span class="glyphicon glyphicon-remove"></span> cancel</button>

</div>

    <script  src="js/index.js"></script>

</body>
</html>
