<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{
  if(isset($_POST['submit']))
  {
    $names=$_POST['names'];
    $age=$_POST['age'];
    $studentno=$_POST['studentno'];
    $Gender=$_POST['Gender'];
    $class=$_POST['class'];
    $cu_year=$_POST['cu_year'];
    $parentname=$_POST['parentname'];
    $relation=$_POST['relation'];
    $ocupation=$_POST['ocupation'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $nextphone=$_POST['nextphone'];
    $country=$_POST['country'];
    $district=$_POST['district'];
    $state=$_POST['state'];
    $pincode=$_POST['pincode'];
    $photo=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentimages/".$_FILES["photo"]["name"]);
    $query=mysqli_query($con, "insert into  students(studentno,StudentName,class,cu_year,age,gender,email,parentName,relation,occupation,country,district,state,pincode,contactno,nextphone,studentImage) value('$studentno','$names','$class','$cu_year','$age','$Gender','$email','$parentname','$relation','$ocupation','$country','$district','$state','$pincode','$phone','$nextphone','$photo')");
    if ($query) {
      echo "<script>alert('Student has been registered.');</script>"; 
      echo "<script>window.location.href = 'add_student.php'</script>";   
      $msg="";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }
  }
  ?>
  <!DOCTYPE html>
  <html>
  <?php @include("includes/head.php"); ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php @include("includes/header.php"); ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php @include("includes/sidebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Student</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row ">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Student</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <span style="color: brown"><h5>Student details</h5></span>
                      <hr>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="studentno">Student No.</label>
                          <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Enter student No" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="names">Name</label>
                          <input type="text" class="form-control" id="names" name="names" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Age</label>
                          <input type="number" class="form-control" id="age" name="age" placeholder="age"required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Gender">Gender</label>
                          <select type="select" class="form-control" id="Gender" name="Gender"required>
                            <option>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-4">
                          <label for="age">Class</label>
                          <select type="select" class="form-control" id="class" name="class" required>
                            <option>Select Class</option>
                            <option value="CSDS-A">CSDS-A</option>
                            <option value=CSDS-B>CSDS-B</option>
                            <option value="AI">AI</option>
                            <option value="IOT">IOT</option>
                            <option value="IT">IT</option>
                           
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="age">year</label>
                          <select type="select" class="form-control" id="cu_year" name="cu_year">
                            <option>Select year</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="exampleInputFile">Student Photo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="" name="photo" id="photo" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <span style="color: brown"><h5>Parent details</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3">
                          <label for="parentname">Parent Name.</label>
                          <input type="text" class="form-control" id="parentname" name="parentname" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-5">
                          <label for="relation">Relationship</label>
                          <select type="select" class="form-control" id="relation" name="relation"required>
                            <option>Select Relationship</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Other">Other</option>
                            
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="age">Email</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="Gender">Ocupation</label>
                          <select type="select" class="form-control" id="ocupation" name="ocupation"required>
                            <option>occupation</option>
                            <option value="Doctor">Doctor</option>
                            <option value="Engineer">Engineer</option>
                            <option value="Bussiness man">Bussiness man</option>
                             <option value="Government">Government Officer</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Driver">Driver</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Other">Other</option>
                            
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-3 offset-md-6">
                          <label for="phone1">Phone 1</label>
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="nextphone">Phone 2</label>
                          <input type="text" class="form-control" id="nextphone" name="nextphone" placeholder="phone2" required>
                        </div>
                      </div>
                      <hr>
                      <span style="color: brown"><h5>Address</h5></span>
                      <div class="row">
                        <div class="form-group col-md-3 ">
                          <label for="phone1">Country.</label>
                          <select type="select" class="form-control" id="country" name="country"required>
                            <option>Select country</option>
                            <option value="India">India</option>
                            
                          </select>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="district">District</label>
                          <input type="text" class="form-control" id="district" name="district" placeholder="district"required>
                        </div>
                        <div class="form-group col-md-3 ">
                          <label for="county">State</label>
                          <input type="text" class="form-control" id="state" name="state" placeholder="State"required>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="pincode">pincode</label>
                          <input type="number" class="form-control" id="pincode" name="pincode" placeholder="pincode"required>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php @include("includes/footer.php"); ?>

    </div>

    <!-- ./wrapper -->
    <?php @include("includes/foot.php"); ?>
  </body>
  </html>
  <?php
}?>
