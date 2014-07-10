<?php include 'php/header.php'; ?>
<script src="js/ajax.js"></script>
<style>.record{text-align:center;margin:5px;border-radius: 5px;border: 1px solid lightgrey;padding: 10px;display: inline-block;}.record img{margin:2px;border-radius:50%;width:50px;transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;-webkit-transition:all .5s;-ms-transition:all .5s;}.record a{display:block;}.record:hover img{transform:scale(1.5);-moz-transform:scale(1.5);-o-transform:scale(1.5);-webkit-transform:scale(1.5);-ms-transform:scale(1.5);box-shadow:0px 0px 2px 2px grey;}</style>
<div id="content" class="col-md-9">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Search Students</th>
        <th>Enter your information</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <form role="form" action="php/search.php" method="get">
             <div class="form-group">
              <label for="searchByName">Search by name </label>
              <input id="searchByName" class="form-control" type="text" name="name" placeholder="Eg : Rahul">
            </div>
            <div class="form-group">
              <label for="searchByRoll">Search by roll number</label>
              <input id="searchByRoll" class="form-control" type="text" name="roll" placeholder="Eg : 123/MP/12">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
          </form>
        </td>
        <td>
          <?php if(strpos($_SERVER['REQUEST_URI'],"s=1") !== false) echo '<h2> Successfully Uploaded!</h2>'; ?>
          <form role="form" action="php/addstudents.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="studentName">Name </label>
              <input type="text" class="form-control" id="studentName" name="name" placeholder="Eg : Rahul">
            </div>
            <div class="form-group">
              <label for="studentRoll">Roll Number </label>
              <input type="text" class="form-control" id="studentRoll" name="roll" placeholder="Eg : 123/MP/12">
            </div>
            <div class="form-group">
              <label for="studentEmail">Email </label>
              <input id="studentEmail" class="form-control" type="email" name="email" placeholder="Eg : someone@somewhere.com">
            </div>
            <div class="form-group">
              <label for="studentImage">Upload your image</label>
              <input id="studentImage" type="file" name="image">
              <p class="help-block">Not larger than 1 MB.</p>
            </div>
            <button type="submit" class="btn btn-default">Upload</button>
          </form>
        </td>
      </tr>
    </tbody>
  </table>
  <div id="results">
  </div>
</div>
<?php include 'php/footer.php'; ?>