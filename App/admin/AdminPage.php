<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <style>

    </style>
    <title>Admin Page</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body class="bg-light text-dark">
    <div class="container-fluid">
      <div class="row clearfix">
        <div class="col-2 p-3 mb-2">
          <div class="row">
            <div class="col-6 text-center">
              <a href="../Views/Homepage.html"><button type="button" class="btn btn-outline-dark">Home</button></a>
            </div>
            <div class="col-6 text-center">
              <a href="../Login/logout.php"><button type="button" class="btn btn-outline-dark">Logout</button></a>
            </div>
          </div>
          <div class="row text-center mt-3">
            <div class="col-12">Hello Admin!</div>
          </div>
        </div>
        <div class="col-10">
          <nav class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
            <a class="nav-item nav-link active" id="nav-books-tab" data-toggle="tab" href="#nav-books" role="tab" aria-controls="nav-books" aria-selected="true">Books</a>
            <a class="nav-item nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="false">Users</a>
            <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
            <a class="nav-item nav-link" id="nav-addBook-tab" data-toggle="tab" href="#nav-addBook" role="tab" aria-controls="nav-addBook" aria-selected="false">Add book</a>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-books" role="tabpanel" aria-labelledby="nav-books-tab">
            <table class="table table-hover text-center table-striped table-dark table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Authors</th>
                    <th scope="col">Genres</th>
                    <th scope="col">Views</th>
                    <th scope="col">Description</th>
                    <th scope="col">Url</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id='book-data'>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
              <table class="table table-hover text-center table-striped table-dark table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Role</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id='user-data'>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
            <table class="table table-hover text-center table-striped table-dark table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">ID book</th>
                    <th scope="col">Content</th>
                    <th scope="col">Time</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id='comment-data'>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="nav-addBook" role="tabpanel" aria-labelledby="nav-addBook-tab">
              <form id='add-book'>
                <div class="form-group">
                  <label class="col-form-label" for="addBookTitle">Title</label>
                  <input type="text" class="form-control" id="addBookTitle" name="addBookTitle" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="addBookAuthors">Authors</label>
                  <input type="text" class="form-control" id="addBookAuthors" name="addBookAuthors" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="addBookGenres">Genres</label>
                  <input type="text" class="form-control" id="addBookGenres" name="addBookGenres" required>
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="addBookDescription">Description</label>
                  <input type="text" class="form-control" id="addBookDescription" name="addBookDescription">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="addBookUrl">Url</label>
                  <input type="text" class="form-control" id="addBookUrl" name="addBookUrl" required pattern="https?://.+" title="Correct url">
                </div>
                <div class="form-group">
                  <label class="col-form-label" for="addBookImage">Image</label> 
                  <input type="text" class="form-control" id="addBookImage" name="addBookImage" required pattern="(https?:\/\/.*\.(?:png|jpeg|jpg|gif))" title="Correct image url">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="edit-book-id" class="col-form-label">ID:</label>
                <input type="text" class="form-control" id="edit-book-id" readonly >
              </div>
              <div class="form-group">
                <label for="edit-book-title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="edit-book-title">
              </div>
              <div class="form-group">
                <label for="edit-book-authors" class="col-form-label">Authors:</label>
                <input type="text" class="form-control" id="edit-book-authors">
              </div>
              <div class="form-group">
                <label for="edit-book-genres" class="col-form-label">Genres:</label>
                <input type="text" class="form-control" id="edit-book-genres">
              </div>
              <div class="form-group">
                <label for="edit-book-description" class="col-form-label">Description:</label>
                <input type="text" class="form-control" id="edit-book-description">
              </div>
              <div class="form-group">
                <label for="edit-book-url" class="col-form-label">Url:</label>
                <input type="text" class="form-control" id="edit-book-url">
              </div>
              <div class="form-group">
                <label for="edit-book-image" class="col-form-label">Image:</label>
                <input type="text" class="form-control" id="edit-book-image">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
            <button type="button" class="btn btn-primary" onclick="edit()">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      getData('book')
      getData('user')
      getData('comment')

      function getData(type) {
        $.ajax({
          url: "./AdminHandler.php",
          type: "post",
          data: {
            action: "getData",
            type: type
          },

          success: function( data ) {
            $(`#${type}-data`).html(data)
          }
        })
      }

      function del(type,id) {
        $.ajax({
          url: "./AdminHandler.php",
          type: "post",
          data: {
            action: "del",
            type: type,
            id: id,
          },

          success: function( data ) {
            alert(data)
            getData(type)
          }
        })
      }

      function getEditData(id) {
        $.ajax({
          url: "./AdminHandler.php",
          type: "post",
          data: {
            action: "getEditData",
            id: id
          },

          success: function( data ) {
            fillModal(JSON.parse(data));
          }
        })
      }

      function fillModal(data) {
        var id = data[0]
        var title = data[1]
        var authors = data[2]
        var genres = data[3]
        var description = data[5]
        var url = data[6]
        var image = data[7]

        var modal = $('#editModal')
        modal.find('.modal-title').text('Edit book ' + title)
        modal.find('.modal-body #edit-book-id').val(id)
        modal.find('.modal-body #edit-book-title').val(title)
        modal.find('.modal-body #edit-book-authors').val(authors)
        modal.find('.modal-body #edit-book-genres').val(genres)
        modal.find('.modal-body #edit-book-description').val(description)
        modal.find('.modal-body #edit-book-url').val(url)
        modal.find('.modal-body #edit-book-image').val(image)
      }

      function edit() {
        var modal = $('#editModal')
        var id = modal.find('.modal-body #edit-book-id').val()
        var title = modal.find('.modal-body #edit-book-title').val()
        var authors = modal.find('.modal-body #edit-book-authors').val()
        var genres = modal.find('.modal-body #edit-book-genres').val()
        var description = modal.find('.modal-body #edit-book-description').val()
        var url = modal.find('.modal-body #edit-book-url').val()
        var image = modal.find('.modal-body #edit-book-image').val()

        $.ajax({
          url: "./AdminHandler.php",
          type: "post",
          data: {
            action: "editBook",
            data: [id,title,authors,genres,description,url,image]
          },

          success: function( data ) {
            alert(data);
            getData('book');
            if (data.includes('Success')) $('#closeModal').click();
          }
        })
      }

      $('#add-book').submit(function(event) {
        event.preventDefault();

        $.ajax({
          url: "./AdminHandler.php",
          type: "post",
          data: {
            action: "addBook",
            data: $( this ).serializeArray()
          },

          success: function( data ) {
            alert(data);
            getData('book');
            if (data.includes('Success')) $('#add-book')[0].reset();
          }
        })
      })
    </script>
    
  </body>
</html>