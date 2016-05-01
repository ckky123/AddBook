<?php
session_save_path('/home/hudson/pg/kqpm28/public_html/AddBook/AddBookSession');
ini_set('session.gc_probability', 1);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mystyle.css" />
 
        <style type="text/css">
           
        </style>
    </head>
    <body>
        <?php
            include('AddBookDB.php');
            if ($connect) {
                if ($_SESSION["timeout"] < time()) {
                    unset($_SESSION['userid']);
                    unset($_SESSION['facebook']);
                    unset($_SESSION['timeout']);
                }
                
                if ($_SESSION["userid"]) {
                    $_SESSION["timeout"] = time() + 1200;       
                    $pageNo = (empty($_GET['page'])) ? 1 : $_GET['page'];
                    $show = (empty($_GET['show'])) ? 5 : $_GET['show']; 
                    
                    if (($_GET['text']) && 
                        ($_GET['type'] === "Name" || 
                         $_GET['type'] === "Address" ||
                         $_GET['type'] === "Email" ||
                         $_GET['type'] === "PhoneNumber")) {
                        $sql="SELECT * FROM MyAddBook WHERE ".$_GET['type']." LIKE '".$_GET['text']."%' AND userid = '".$_SESSION["userid"]."'";
                        $limit_sql="SELECT * FROM MyAddBook WHERE ".$_GET['type']." LIKE '".$_GET['text']."%' AND userid = '".$_SESSION["userid"]."' LIMIT ".(($pageNo - 1) * $show).", ".$show;
                    } else {
                        $sql="SELECT * FROM MyAddBook WHERE userid = '".$_SESSION["userid"]."'";
                        $limit_sql="SELECT * FROM MyAddBook WHERE userid = '".$_SESSION["userid"]."' LIMIT ".(($pageNo - 1) * $show).", ".$show;
                    }

                    $result = mysql_query($sql,$connect);
                    $count = mysql_num_rows($result);
                    $maxPage = ceil($count / $show);
                    $startPage = ($pageNo - 5 < 1) ? 1 : $pageNo - 5;
                    echo '<div>';
                    if ($maxPage > 1) {
                        for ($i = $startPage; $i <= Min($startPage + 10, $maxPage); $i++) {
                            if ($i != $pageNo) {
                                echo ' <a href="#" onclick="return showResult('.$i.')">'.$i.'</a> ';
                            } else {
                                echo ' '.$i.' ';
                            }
                        }
                    }

                    $result = mysql_query($limit_sql,$connect);
                    if ($result) {
                        echo '<table><tr>';
                        echo '<th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>PhoneNumber</th>
                        <th>Time</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr>';
                        
                        while($row = mysql_fetch_array($result)) {
                            $id=$row['id'];        
                            $name=$row['Name'];
                            $address=$row['Address'];
                            $email=$row['Email'];
                            $phonenumber=$row['PhoneNumber'];
                            echo '<tr id=row'.$id.'>';
                            echo '<td>' . $row['Name'] . '</td>';
                            echo '<td>' . $row['Address'] . '</td>';
                            echo '<td><a href="mailto:'.$row['Email'].'?Subject=Hello"style="color:#B2DFEE;" onmouseover="overStyle(this)" onmouseout="outStyle(this)"target="_top">' . $row['Email'] . '</a></td>';
                            echo '<td>' . $row['PhoneNumber'] . '</td>';
                            echo '<td>' . $row['reg_date'] . '</td>';
                            echo '<td> 
                                    <a href="AddBookEdt.php?id='.$id.'" onclick="return confirm(\'Are you sure you want to Edit?\')" onmouseover="overStyle(this)" onmouseout="outStyle(this)"  style="color:#B2DFEE;" >Edit</a>
                                 </td>';
                            echo '<td>
                                     <a id='.$id.' href="#" onclick="return RemoveData(this.id)" onmouseover="overStyle(this)" onmouseout="outStyle(this)" style="color:#B2DFEE;" >Delete</a>
                                 </td>';
                            echo '';
                        }
                        echo '</tr></table>';
                    }
                    echo '</div>';
                }
                mysql_close($connect);  
            }
        ?>
 
    </body>
</html>
