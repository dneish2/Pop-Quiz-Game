<?php
// db.php
// Home page functions
// Profile page functions


function getWins() {
  return [
    [
      'chapter-number' => 1,
      'title' => 'Some title once told me',
      'total-chapters' => 42
    ],
    [
      'chapter-number' => 2,
      'title' => 'We\'re going title title in a merry go title',
      'total-chapters' => 2
    ],
    [
      'chapter-number' => 3,
      'title' => 'Title Title Title Title Title',
      'total-chapters' => 82
    ],
  ];
}
function getName($username) {
  $stories = runSafeQuery(
    "SELECT * FROM user WHERE username = ?",
    ['s', $user]
  );
  $story = reset($stories);
  $chapters = runSafeQuery(
    "SELECT * FROM chapters WHERE story_id = ?",
    ["i", $id]
  );
  return [
    'name' => $username['username'],
    'chapters' => $chapters
  ];
}
function getConnection() {
  $connection = new mysqli('localhost:3306', 'root', '', 'popdb');
  if ($connection->error) {
    die("Creating connection failed:" . $connection->error);
  }
  return $connection;
}
function simpleGet($sqlQuery) {
  $connection = getConnection();
  $result = $connection->query($sqlQuery);
  $items = [];
  while ($row = $result->fetch_assoc()) {
    $items[] = $row;
  }
  return $items;
}
function runSafeQuery($query, $params) {
  $connection = getConnection();
  // PREPARE
  $statement = $connection->prepare($query);
  // check if prepare failed
  if ($statement == false) {
    die('Prepare failed: ' . $connection->error);
  }
  // BIND PARAMETERS
  // ex SELECT * FROM dogs WHERE id = ? AND name = ?
  // $statement->bind_param('is', 1, 'spot');
  // s = string, i = int, b = blob/binary
  if (count($params) > 0) {
    $statement->bind_param(...$params);
  }
  if ($statement->error) {
    die('Bind failed: ' . $statement->error);
  }
  $success = $statement->execute();
  if ($success == false) {
    die('Execute failed: ' . $statement->error);
  }
  $result = $statement->get_result();
  $connection->close();
  $results = [];
  // var_dump($result);
  // die("RESULT IS" . $result);
  while ($result && $row = $result->fetch_array()) {
    $results[] = $row;
  }
  return $results;
}
function removeExcerptById($id) {
  runSafeQuery(
    "DELETE FROM editor_picks WHERE id = ?",
    ["i", $id]
  );
}
function getCompletedStories() {
  $stories = runSafeQuery(
    "SELECT * FROM stories WHERE is_done = true",
    []
  );
  foreach ($stories as &$story) {
    $story['chapters'] = runSafeQuery(
      "SELECT * FROM chapters WHERE story_id = " . $story['id'],
      []
    );
  }
  return $stories;
}

?>
