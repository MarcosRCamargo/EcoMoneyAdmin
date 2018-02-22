<?php
/**
 * Created by PhpStorm.
 * User: Marcos Rubens de Camargo
 * Date: 17/02/2018
 * Time: 10:34
 */
include ("header.php");
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-6">
                <div class="card text-white p-5 bg-primary">
                    <div class="card-body">
                        <h1 class="mb-4">Login form</h1>
                        <form action="https://formspree.io/YOUREMAILHERE">
                            <div class="form-group"> <label>Email address</label>
                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                            <div class="form-group"> <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password"> </div>
                            <button type="submit" class="btn btn-secondary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ("footer.php");