

<div class="container">
    <div class="col-md-6 col-md-offset-2" ng-controller="HomeCtrl">

        <form class="form-group" action="" method="post">

            <h1>Post page</h1>

            <label>Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title" ng-model="title">
            <label>Description </label>
            <input type="text" class="form-control" name="description" ng-model="description" placeholder="What is your Description ? " >
            <label  >Category</label>
            <input type="text" class="form-control" placeholder="Category">

            <button class="btn  btn-success " type="submit">Add Post</button>

        </form>
    </div>


</div> <!-- /container -->

