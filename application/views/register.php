<?php include('partials/head.php') ?>

<div class="container">
<div class="col-md-6 col-md-offset-2">

        <form class="form-group" action="" method="post">

            <h1>Registration page</h1>

            <label>Username</label>
            <input type="text" class="form-control" placeholder="UserName">
            <label>Email address</label>
            <input type="email" class="form-control" placeholder="Email address" required>
            <label  >Password</label>
            <input type="password" class="form-control" placeholder="Password">
            <label >Again Password</label>
            <input type="password" class="form-control" placeholder="again Password">

            <button class="btn  btn-primary " type="submit">Register</button>

        </form>
    </div>


</div> <!-- /container -->


<?php include('partials/footer.php') ?>
