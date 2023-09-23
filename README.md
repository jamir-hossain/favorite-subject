# favorite-subject

```php
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

```

## How to find and return the students with most favorite subject?

### Step 1

```php
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
```

First I have been counted the most used of each subject. After running this, I got the maximum number of used for each subject.

### Step 2

```php
$mostFavoriteSubject = "";
$maxCount = 0;
foreach ($subjectCounts as $subject => $count) {
   if ($count > $maxCount) {
      $mostFavoriteSubject = $subject;
      $maxCount = $count;
   }
}
```

After getting the maximum number of used for each subject now I get the most favorite subject from these

### Step 3

```php
$studentsWithMostFavoriteSubject = [
   'favorite_subject' => $mostFavoriteSubject,
   'favorite_subject_students' => []
];

foreach ($students as $student) {
   if (in_array($mostFavoriteSubject, $student["Favorite Subjects"])) {
      $studentsWithMostFavoriteSubject['favorite_subject_students'][] = $student;
   }
}
```

In this step, I have filtered the students who have the most favorite subject that I got from the previous step.

### Run this code

```shell
php index.php
```
