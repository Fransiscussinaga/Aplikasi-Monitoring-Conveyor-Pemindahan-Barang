<div class="container"> 
    <div class="row text-center ">
            <br /><br />
            <h2> Login</h2>
           
            <h5>( Login yourself to get access )</h5>
             <br />
    </div>
     <div class="row ">  
      <div class="col-md-4 col-md-offset-4 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                <center>
                    <strong>   Enter Details To Login </strong>  
                </center>
                </div>
                <div class="panel-body">
                    <form role="form" action="logedin.php" method="POST">
                           <br />
                         <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Your Username " />
                            </div>
                         <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                            </div>
                        <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <!-- <span class="pull-right">
                                       <a href="#" >Forget password ? </a> 
                                </span> -->
                            </div>
                         
                            <center>
                                <input type="submit" name="submit" value="Login Now" class="btn btn-primary">
                            </center>
                        <hr />
                        <!-- Not register ? <a href="registeration.html" >click here </a>  -->
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>