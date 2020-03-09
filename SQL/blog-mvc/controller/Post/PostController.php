<?php

/**
 * Created by PhpStorm.
 * User: nhat
 * Date: 12/19/17
 * Time: 7:17 PM
 */

namespace Controller;

use \model\DBConnection;
use \model\PostDB;
use \model\Post;

class PostController
{
    public $postDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=blog", "root", "");
        $this->postDB = new PostDB($connection->connect());
    }

    public function index()
    {
        $posts = $this->postDB->getAll();
        include '../../view/Post/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include '../../view/Post/add.php';
        } else {
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $this->postDB->create($post);
            $message = 'Post created';
            include '../../view/Post/add.php';
        }
    }

    public function view()
    {
        $id = $_GET['id'];
        $post = $this->postDB->get($id);
        include '../../view/Post/view.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $post = $this->postDB->get($id);
            include '../../view/Post/delete.php';
        } else {
            $id = $_POST['id'];
            $this->postDB->delete($id);
            header('Location: index-post.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $post = $this->postDB->get($id);
            include '../../view/Post/edit.php';
        } else {
            $id = $_POST['id'];
            $post = new Post($_POST['title'], $_POST['teaser'], $_POST['content'], $_POST['created']);
            $this->postDB->update($id, $post);
            header('Location: index-post.php');
        }
    }
}