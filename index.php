<?php

$students = [
   [
      "Name" => "John",
      "Age" => 20,
      "Favorite Subjects" => ["Math", "Science", "English"]
   ],
   [
      "Name" => "Alice",
      "Age" => 18,
      "Favorite Subjects" => ["History", "English"]
   ],
   [
      "Name" => "Bob",
      "Age" => 19,
      "Favorite Subjects" => ["Art", "Music"]
   ]
];

// Count the most used of each subject
$subjectCounts = [];
foreach ($students as $student) {
   foreach ($student["Favorite Subjects"] as $subject) {
      if (isset($subjectCounts[$subject])) {
         $subjectCounts[$subject]++;
      } else {
         $subjectCounts[$subject] = 1;
      }
   }
}

// Find the most favorite subject
$mostFavoriteSubject = "";
$maxCount = 0;
foreach ($subjectCounts as $subject => $count) {
   if ($count > $maxCount) {
      $mostFavoriteSubject = $subject;
      $maxCount = $count;
   }
}

// Filter students who have the most favorite subject
$studentsWithMostFavoriteSubject = [
   'favorite_subject' => $mostFavoriteSubject,
   'favorite_subject_students' => []
];

foreach ($students as $student) {
   if (in_array($mostFavoriteSubject, $student["Favorite Subjects"])) {
      $studentsWithMostFavoriteSubject['favorite_subject_students'][] = $student;
   }
}

// Display the students with the most favorite subject
echo json_encode($studentsWithMostFavoriteSubject);
