<?php

class Node {

          public $info;
          public $left;
          public $right;


          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;

          }

          public function __toString() {
                 return "$this->info";
          }
    }  

    class SearchBinaryTree {

          public $root;
          public function  __construct() {
                 $this->root = NULL;
          }
          public function create($info) {              
                 if($this->root == NULL) {
                    $this->root = new Node($info);
                 } else {  
                    $current = $this->root;
                    while(true) {
                          if($info < $current->info) {                         
                                if($current->left) {
                                   $current = $current->left;
                                } else {
                                   $current->left = new Node($info);
                                   break; 
                                }
                          } else if($info > $current->info){

                                if($current->right) {
                                   $current = $current->right;
                                } else {
                                   $current->right = new Node($info);
                                   break; 
                                }
                          } else {
                            break;
                          }
                    } 
                 }
          }

          public function traverse($method) {

                 switch($method) {

                     case 'inorder':
                     $this->_inorder($this->root);
                     break;

                     case 'postorder':
                     $this->_postorder($this->root);
                     break;
    
                     case 'preorder':
                     $this->_preorder($this->root);
                     break;
   
                     default:
                     break;
                 } 

          } 

          private function _inorder($node) {

                          if($node->left) {
                             $this->_inorder($node->left); 
                          } 

                          echo $node. " - ";

                          if($node->right) {
                             $this->_inorder($node->right); 
                          } 
          }


          private function _preorder($node) {

                          echo $node. " - ";

                          if($node->left) {
                             $this->_preorder($node->left); 
                          } 


                          if($node->right) {
                             $this->_preorder($node->right); 
                          } 
          }


          private function _postorder($node) {


                          if($node->left) {
                             $this->_postorder($node->left); 
                          } 


                          if($node->right) {
                             $this->_postorder($node->right); 
                          } 

                          echo $node. " - ";
          }


          
    } 
               	if(isset($_POST['arrseq']))
               	$arr2 = $_POST['arrseq'];
     			else
     			$arr2 = "";
     			$arr = explode(',', $arr2);
    			
               $tree = new SearchBinaryTree();
               for($i=0,$n=count($arr);$i<$n;$i++) {
                   $tree->create($arr[$i]);
               }

  ?>

  	 <!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<title>Assignment in BST</title>
	<link href="style.css" rel="stylesheet">
	</head>

     <form action="" method="POST">
		<p>Insert number separated by comma ",". <br> Ex: 7,8,4,5,6,11,20 </p>
     <input type="text" class="arr" name="arrseq">
     <input class="sub-but" type=submit>
     <br><br>
    
<?php
    echo"<h1>Binary Search Tree</h1>"; 
    echo "<h2>Input:</h2><h4 style=\"color:black\">", join($arr," - "), "</h4>";
    echo"<h1>Inorder</h1><h4 style=\"color:red\">"; 
    $tree->traverse('inorder');
    echo"</h4><h1>Postorder</h1><h4 style=\"color:green\">"; 
    $tree->traverse('postorder');
    echo"</h4><h1>Preorder</h1><h4 style=\"color:blue\">"; 
    $tree->traverse('preorder');
  
?>

 </form>
     </html>