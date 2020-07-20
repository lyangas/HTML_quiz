<?php
if (isset($_POST['checked_name'])) {
    $checked_name = htmlspecialchars(trim($_POST['checked_name']));
    $current_q = htmlspecialchars(trim($_POST['q']));

    $raw_statistic = file_get_contents('statistic.txt');
	$statistic = json_decode($raw_statistic, true);

	$statistic[$current_q]["cnt"] += 1;
	$statistic[$current_q][$checked_name] += 1;

    $file=fopen('statistic.txt','w'); 
	fputs($file, json_encode($statistic)); 
	fclose($file); 

	echo json_encode($statistic);
}

if (isset($_POST['current_q'])) {
	$current_q = htmlspecialchars(trim($_POST['current_q']));

    $raw_questions = json_encode(file_get_contents('questions.txt'));
    $questions = json_decode($raw_questions, true);
    //$raw_questions = str_replace('\n', '', $raw_questions);
    //$raw_questions = str_replace('\t', '', $raw_questions);
    //$questions = json_decode($raw_questions, true);
    //$question = $questions[$current_q];

    //echo $questions[$current_q];
	echo $questions;
}

?>