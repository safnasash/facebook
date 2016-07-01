<html>
<head>
    <title>facebook</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <?php $this->load->helper('url'); ?>
</head>
<body>
    
    
    <div class="container_fluid">
        <div class="row">
            <div class= "col-md-12" style="background-color:#4867AA">
                <div class="col-md-offset-2 col-md-2">
                    <img style="" class="img-responsive" src="<?php echo base_url('images/facebook.jpg'); ?> ">
                </div>
                <div class=" col-md-1">
                    <br><br>
                    <button  class="btn btn-success btn-sm" type="submit" onclick="">sign up</button>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="background-color:#edF0F5"><br><br>
                    <div class="col-md-offset-4 col-md-4">
                        <form name="fb" style="background-color:#FFFFFF"><br>
                        <div class="col-md-offset-4 col-md-6"><font color="#151B8D"><b>Log in To Facebook</b></font></div> <br><br>
                        
                        <?php
                            foreach($data as $key=>$val)
                            { 
                        ?>
                        
                            <!--$img=$user['vchr_prof_pic'];
                            //$fname=$data['vchr_user_name'];
                           // $sname=$data[''];-->
                         
                        
                        <div class="col-md-offset-1 col-md-3">Login as</div><div class="col-md-offset col-md-6"><img  size="2px" width="50" src="<?php echo $key['profile_pic']; ?> <?php echo $key['email']; ?>"</div><br><br><br> 
                        <div class="col-md-offset-1 col-md-3">Password</div><div class="col-md=offset-1 col-md-6"><input type="text"class="form-control" ></div><br><br>
                        <div class="col-md-offset-2 col-md-7"><input type="button" value="Login"></div><br><br>
                        <div class="col-md-offset-3 col-md-8"><font color="#151B8D">Having trouble?Sign up for facebook</font></div> <br><br>
                        <?php } ?>
                    </div>        
                </div>    
        </div>
       
</body>
</html>