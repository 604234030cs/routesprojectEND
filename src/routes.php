<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header("Content-type:application/json",true);

// get all mainparent
    $app->get('/allparent', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM parent2 ");
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
// get all studentandparent where class_id
    $app->get('/standparedit/[{idclass}&&{paruser}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM student2,parent2 WHERE student2.par_user = parent2.par_user AND student2.class_id = :idclass AND parent2.par_user=:paruser");
        $sth->bindParam("idclass", $args['idclass']);
        $sth->bindParam("paruser", $args['paruser']);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
// get all parentandstudent
    $app->get('/parentandstudent/{idclass}', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM student2,parent2 WHERE student2.par_user = parent2.par_user AND student2.class_id = :idclass");
         $sth->bindParam("idclass", $args['idclass']);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
// get all mainparent
    $app->get('/allclass', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM `classroom2` ");
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
// get all mainstudent
    $app->get('/studentandparent', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM `student`,`parents` WHERE parents.pr_user = student.pr_user");
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
    //get all student
    $app->get('/student/{pr_user}', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM `student`,`parents` WHERE student.pr_user = parents.pr_user AND student.pr_user  = :pr_user ");
        $sth->bindParam("pr_user", $args['pr_user']);
       $sth->execute();
       $todos = $sth->fetchAll();
       return $this->response->withJson($todos);
   });
   // edit student 
   $app->any('/editst/[{s_id}&&{st_title}&&{st_name}&&{st_lassname}&&{st_class}&&{pr_user}]',function ($request, $response, $args){
    $sql = "UPDATE student SET st_title=:st_title,st_name=:st_name,st_lassname=:st_lassname,st_class=:st_class,pr_user=:pr_user  WHERE s_id=:s_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("s_id", $args['s_id']);
    $sth->bindParam("st_title", $args['st_title']);
    $sth->bindParam("st_name", $args['st_name']);
    $sth->bindParam("st_lassname", $args['st_lassname']);
    $sth->bindParam("st_class", $args['st_class']);
    $sth->bindParam("pr_user", $args['pr_user']);
    if($sth->execute()){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });
   // edit student 2
   $app->any('/editsts/[{s_id}&&{st_title}&&{st_name}&&{st_lassname}&&{st_class}&&{pr_user}]',function ($request, $response, $args){
    $sql = "UPDATE student SET st_title=:st_title,st_name=:st_name,st_lassname=:st_lassname,st_class=:st_class,pr_user=:pr_user  WHERE s_id=:s_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("s_id", $args['s_id']);
    $sth->bindParam("st_title", $args['st_title']);
    $sth->bindParam("st_name", $args['st_name']);
    $sth->bindParam("st_lassname", $args['st_lassname']);
    $sth->bindParam("st_class", $args['st_class']);
    $sth->bindParam("pr_user", $args['pr_user']);
    if($sth->execute()){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });
   // edit parent 
   $app->any('/editparent/[{p_id}&&{pr_title}&&{pr_name}&&{pr_lassname}&&{pr_address}&&{pr_phone}]',function ($request, $response, $args){
    $sql = "UPDATE parents SET pr_title=:pr_title,pr_name=:pr_name,pr_lassname=:pr_lassname,pr_address=:pr_address,pr_phone=:pr_phone  WHERE p_id=:p_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("p_id", $args['p_id']);
    $sth->bindParam("pr_title", $args['pr_title']);
    $sth->bindParam("pr_name", $args['pr_name']);
    $sth->bindParam("pr_lassname", $args['pr_lassname']);
    $sth->bindParam("pr_address", $args['pr_address']);
    $sth->bindParam("pr_phone", $args['pr_phone']);
    if($sth->execute()){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });
    // edit teacher
   $app->any('/editteacher/[{teacher_id}&&{teacher_title}&&{teacher_name}&&{teacher_sname}&&{teacher_address}&&{teacher_tel}]',function ($request, $response, $args){
    $sql = "UPDATE teacher2 SET teacher_title=:teacher_title,teacher_name=:teacher_name,teacher_sname=:teacher_sname,teacher_address=:teacher_address,teacher_tel=:teacher_tel  WHERE teacher_id=:teacher_id";
    $sth = $this->db->prepare($sql);
    $sth->bindParam("teacher_id", $args['teacher_id']);
    $sth->bindParam("teacher_title", $args['teacher_title']);
    $sth->bindParam("teacher_name", $args['teacher_name']);
    $sth->bindParam("teacher_sname", $args['teacher_sname']);
    $sth->bindParam("teacher_address", $args['teacher_address']);
    $sth->bindParam("teacher_tel", $args['teacher_tel']);
    if($sth->execute()){
        $status = 'Success';
    }else{
        $status = 'Error';
    }
    return $this->response->withJson($status);

    });
       // register
       $app->post('/register', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO teacher2( teacher_user,teacher_password,teacher_title,teacher_name,teacher_sname,teacher_address,teacher_tel,teacher_latitude,teacher_longitude) 
        VALUES (:teacher_user,:teacher_password,:teacher_title,:teacher_name,:teacher_sname,:teacher_address,:teacher_tel,:teacher_latitude,:teacher_longitude)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("teacher_user", $input['teacher_user']);
        $sth->bindParam("teacher_password", $input['teacher_password']);
        $sth->bindParam("teacher_title", $input['teacher_title']);
        $sth->bindParam("teacher_name", $input['teacher_name']);
        $sth->bindParam("teacher_sname", $input['teacher_sname']);
        $sth->bindParam("teacher_address", $input['teacher_address']);
        $sth->bindParam("teacher_tel", $input['teacher_tel']);
        $sth->bindParam("teacher_latitude", $input['teacher_latitude']);
        $sth->bindParam("teacher_longitude", $input['teacher_longitude']);
        
        $input['id'] = $this->db->lastInsertId();
        if( $sth->execute()){
            $callback = array(
                status => 200,
                msg => 'Insert success'
            );
        }else{
            $callback = array(
                'status' => 404,
                'msg' => 'Insert Fail'
            );
        }
        return $this->response->withJson($callback);
    });
       // registerparent
       $app->post('/registerparent2', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO parent2( par_user,par_password,par_name,par_sname,par_tel,latitude,	longitude) 
        VALUES (:par_user,:par_password,:par_name,:par_sname,:par_tel,:latitude,:longitude)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("par_user", $input['par_user']);
        $sth->bindParam("par_password", $input['par_password']);
        $sth->bindParam("par_name", $input['par_name']);
        $sth->bindParam("par_sname", $input['par_sname']);
        $sth->bindParam("par_tel", $input['par_tel']);
        $sth->bindParam("latitude", $input['latitude']);
        $sth->bindParam("longitude", $input['longitude']);
        
        $input['id'] = $this->db->lastInsertId();
        if( $sth->execute()){
            $callback = array(
                status => 200,
                msg => 'Insert success'
            );
        }else{
            $callback = array(
                'status' => 404,
                'msg' => 'Insert Fail'
            );
        }
        return $this->response->withJson($callback);
    });

    //    // register parent
    //    $app->post('/registerparent', function ($request, $response) {
    //     $input = $request->getParsedBody();
    //     $sql = "INSERT INTO parent2( par_user,par_password,par_name,par_sname,par_tel,latitude,longitude) 
    //     VALUES (:par_user,:par_password,:par_name,:par_sname,:par_tel,:latitude,:longitude)";

       
    //      $sth1 = $this->db->prepare($sql);
         
    //     $sth1->bindParam("par_user", $input['par_user']);
    //     $sth1->bindParam("par_password", $input['par_password']);
    //     $sth1->bindParam("par_name", $input['par_name']);
    //     $sth1->bindParam("par_sname", $input['par_sname']);
    //     $sth1->bindParam("par_tel", $input['par_tel']);
    //     $sth1->bindParam("latitude", $input['latitude']);
    //     $sth1->bindParam("longitude", $input['longitude']);

    //     // $sql2 = "INSERT INTO student2( student_name,student_sname,student_nickname,Student_sex,class_id,par_user) 
    //     // VALUES (:student_name,:student_sname,:student_nickname,:Student_sex,:class_id,:par_user)";

    //     // $sth2 = $this->db->prepare($sql2);

    //     // $sth2->bindParam("student_name", $input['student_name']);
    //     // $sth2->bindParam("student_sname", $input['student_sname']);
    //     // $sth2->bindParam("student_nickname", $input['student_nickname']);
    //     // $sth2->bindParam("Student_sex", $input['Student_sex']);
    //     // $sth2->bindParam("class_id", $input['class_id']);
    //     // $sth2->bindParam("par_user", $input['par_user']);
    //     // $input['par_user'] = $this->db->lastInsertId();
        
    //     // $parents = $sth->fetch();   
    //     // return $this->response->withJson($parents);
    //     $input['par_id'] = $this->db->lastInsertId();
    //     if($sth->execute()){
    //         $call = array(
    //             status => 200,
    //             msg => 'Insert success'
    //         );
    //     }else{
    //         $call = array(
    //             'status' => 404,
    //             'msg' => 'Insert Fail'
    //         );
    //     }
    //     return $this->response->withJson($call);
    // });
       // register
       $app->post('/addclass', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO classroom2( class_name)VALUES (:class_name)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("class_name", $input['class_name']);
        
        $input['id'] = $this->db->lastInsertId();
        if( $sth->execute()){
            $callback = array(
                status => 200,
                msg => 'Insert success'
            );
        }else{
            $callback = array(
                'status' => 404,
                'msg' => 'Insert Fail'
            );
        }
        return $this->response->withJson($callback);
    });
       $app->post('/addstudent2', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO student2( student_name,student_sname,student_nickname,Student_sex,class_id,par_user)
                VALUES (:student_name,:student_sname,:student_nickname,:Student_sex,:class_id,:par_user)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("student_name", $input['student_name']);
        $sth->bindParam("student_sname", $input['student_sname']);
        $sth->bindParam("student_nickname", $input['student_nickname']);
        $sth->bindParam("Student_sex", $input['Student_sex']);
        $sth->bindParam("class_id", $input['class_id']);
        $sth->bindParam("par_user", $input['par_user']);
        
        $input['id'] = $this->db->lastInsertId();
        if( $sth->execute()){
            $callback = array(
                status => 200,
                msg => 'Insert success'
            );
        }else{
            $callback = array(
                'status' => 404,
                'msg' => 'Insert Fail'
            );
        }
        return $this->response->withJson($callback);
    });
       // registerstudent
       $app->post('/registerstudent', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO student( st_id, st_title, st_name, st_lassname, st_class, pr_user) 
        VALUES (:st_id,:st_title,:st_name,:st_lassname,:st_class,:pr_user)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("st_id", $input['st_id']);
        $sth->bindParam("st_title", $input['st_title']);
        $sth->bindParam("st_name", $input['st_name']);
        $sth->bindParam("st_lassname", $input['st_lassname']);
        $sth->bindParam("st_class", $input['st_class']);
        $sth->bindParam("pr_user", $input['pr_user']);
        $input['id'] = $this->db->lastInsertId();
        if( $sth->execute()){
            $callback = array(
                status => 'Success',
                msg => 'Insert success'
            );
        }else{
            $callback = array(
                'status' => 404,
                'msg' => 'Insert Fail'
            );
        }
        return $this->response->withJson($callback);
    });
    // check register 
    
    $app->get('/checkuser/{teacher_user}', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM teacher2 WHERE teacher_user=:teacher_user");
        $sth->bindParam("teacher_user", $args['teacher_user']);
        // $sth->bindParam("tpassword", $args['tpassword']);
        $sth->execute();
        $teacher_user = $sth->fetch();   
        return $this->response->withJson($teacher_user);
    });
    $app->get('/checkparent/{par_user}', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM parent2 WHERE par_user=:par_user");
        $sth->bindParam("par_user", $args['par_user']);
        // $sth->bindParam("tpassword", $args['tpassword']);
        $sth->execute();
        $par_user = $sth->fetch();   
        return $this->response->withJson($par_user);
    });

    $app->get('/checkclass/{class_name}', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM classroom2 WHERE class_name=:class_name");
        $sth->bindParam("class_name", $args['class_name']);
        // $sth->bindParam("tpassword", $args['tpassword']);
        $sth->execute();
        $class_name = $sth->fetch();   
        return $this->response->withJson($class_name);
    });
    // check registerstudent 
    
    $app->get('/checkstudent/{st_id}', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM student WHERE st_id=:st_id");
        $sth->bindParam("st_id", $args['st_id']);
        // $sth->bindParam("tpassword", $args['tpassword']);
        $sth->execute();
        $student = $sth->fetch();   
        return $this->response->withJson($student);
    });
    
    
    // login 
    
    $app->get('/login/[user={teacher_user}&&pass={teacher_password}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM teacher2 WHERE teacher_user=:teacher_user and teacher_password=:teacher_password");
        $sth->bindParam("teacher_user", $args['teacher_user']);
        $sth->bindParam("teacher_password", $args['teacher_password']);
        $sth->execute();
        $todos = $sth->fetch();   
        return $this->response->withJson($todos);
    });
    // teacher
    $app->get('/teacherall/[user={teacher_user}&&pass={teacher_password}]', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT * FROM teacher2  WHERE teacher_user=:teacher_user and teacher_password=:teacher_password");
        $sth->bindParam("teacher_user", $args['teacher_user']);
        $sth->bindParam("teacher_password", $args['teacher_password']);
        $sth->execute();
        $todos = $sth->fetch();   
        return $this->response->withJson($todos);
    });
    // edit student
    $app->any('/updatestudent/[{s_id}&&{st_title}&&{st_name}&&{st_lassname}&&{st_class}&&{pr_user}]', function ($request, $response, $args) {
        $sql="UPDATE student SET st_title=:st_title,st_name=:st_name,st_lassname=:st_lassname,st_class=:st_class,pr_user=:pr_user WHERE s_id=:s_id ";
        $sth = $this->db->prepare($sql); 
        
        $sth->bindParam("s_id ", $args['s_id ']);
        $sth->bindParam("	st_title", $args['	st_title']);
        $sth->bindParam("st_name", $args['st_name']);
        $sth->bindParam("st_lassname", $args['st_lassname']);
        $sth->bindParam("st_class", $args['st_class']);
        $sth->bindParam("pr_user", $args['pr_user']);
    
        
        if ($sth->execute()){
            $err = "Success";
        }else{
            $err = "Fail";
        }
          
        return $this->response->withJson($err);
    });
    // edit teacher 
    $app->any('/updateteacher/[{id}&&{user}&&{ttitle}&&{username}&&{lassname}&&{age}&&{useraddress}&&{phone}]', function ($request, $response, $args) {

        $sql="UPDATE teacher SET tuser=:user,title=:ttitle,tname=:username,tlassname=:lassname,tage=:age,taddress=:useraddress,tphone=:phone WHERE tid=:id";
        $sth = $this->db->prepare($sql);  

        $sth->bindParam("id", $args['id']);
        $sth->bindParam("user", $args['user']);
        $sth->bindParam("ttitle", $args['ttitle']);
        $sth->bindParam("username", $args['username']);
        $sth->bindParam("lassname", $args['lassname']);
        $sth->bindParam("age", $args['age']);
        $sth->bindParam("useraddress", $args['useraddress']);   
        $sth->bindParam("phone", $args['phone']);
        
        if ($sth->execute()){
            $err = "Success";
        }else{
            $err = "Fail";
        }
        //$edit = $sth->fetch();   
        return $this->response->withJson($err);
    });

    
 
 
    // Search parent
    $app->get('/search/[{query}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM parents WHERE pr_name LIKE :query ORDER BY pr_name");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
 

    
 
    // // DELETE student
    // $app->any('/deletest/[{s_id}]', function ($request, $response, $args) {
    //      $sql="DELETE FROM student WHERE s_id=:s_id ";
    //      $sth = $this->db->prepare($sql); 
    //     $sth->bindParam("s_id", $args['s_id']);
    //     $sth->execute();
        
    //     if($sth->execute()){
    //         $dl = "Success";
    //     }else{
    //         $dl = "Fail";
    //     }

    //     return $this->response->withJson($dl);
    // });
    // DELETE student
    $app->any('/deletest/[{par_user}]', function ($request, $response, $args) {
         $sql="DELETE FROM student2 WHERE par_user=:par_user ";
         $sth = $this->db->prepare($sql); 
        $sth->bindParam("par_user", $args['par_user']);
        $sth->execute();


        return $this->response->withJson($dl);
    });
    // DELETE student
    $app->any('/deletepar/[{par_user}]', function ($request, $response, $args) {
         $sql="DELETE FROM parent2 WHERE par_user=:par_user ";
         $sth = $this->db->prepare($sql); 
        $sth->bindParam("par_user", $args['par_user']);
        $sth->execute();
        
        if($sth->execute()){
            $dl = "Success";
        }else{
            $dl = "Fail";
        }

        return $this->response->withJson($dl);
    });
    // // DELETE student
    // $app->any('/deletestandpar/[{st_id}&&{par_id}]', function ($request, $response, $args) {
    //      $sql="DELETE  FROM student2,parent2 WHERE student2.st_id=:st_id  ";
    //      $sql1="DELETE  FROM parent2 WHERE parent2.par_id=:par_id  ";
    //      $sth = $this->db->prepare($sql); 
    //      $sth1 = $this->db->prepare($sql1); 
    //     $sth->bindParam("st_id", $args['st_id']);
    //     $sth1->bindParam("par_id", $args['par_id']);
    //     // $sth->execute();
    //     // $sth->execute1();
    //     if($sth->execute()){
    //         $dlstandpar = "Success";
    //     }else{
    //         $dlstandpar = "Fail";
    //     }
    //     // if($sth->execute1()){
    //     //     $dlstandpar = "Success";
    //     // }else{
    //     //     $dlstandpar = "Fail";
    //     // }

    //     return $this->response->withJson($dlstandpar);
    // });

    $app->put('/testst/[{s_id}]',function ($request, $response, $args){
        $input = $request->getParsedBody();
        $sql = "UPDATE student SET st_name=:st_name WHERE s_id=:s_id";
        $sth = $this->db->prepare($sql);
        $sth->bindParam("s_id", $args['s_id']);
        $sth->bindParam("st_name", $args['st_name']);
        
        $sth->execute();
        $input['s_id'] = $args['s_id'];
        return $this->response->withJson($input);
    });

    