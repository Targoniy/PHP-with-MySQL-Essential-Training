<?php
session_start();

function message()
{
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        $_SESSION["message"] = null;

        return $output;
    }
}

function errors()
{
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];
        
        $_SESSION["errors"] = null;

        return $errors;
    }
}  

function subject_pages()
{
    if (isset($_SESSION["pages"])) {
        $pages = $_SESSION["pages"];
        
        $_SESSION["pages"] = null;

        return $pages;
    }
}

function current_subject_id()
{
    if (isset($_SESSION["current_subject_id"])) {
        $current_subject_id = $_SESSION["current_subject_id"];
        
        $_SESSION["current_subject_id"] = null;

        return $current_subject_id;
    }
}

















