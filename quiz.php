<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Quiz</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <h2>Add Quiz</h2>
    <form id="quizForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="quiz_name">Quiz Name:</label>
        <input type="text" id="quiz_name" name="quiz_name" required>
      </div>
      <div id="questionsContainer">
        <div class="question">
          <div class="form-group">
            <label for="question">Question:</label>
            <textarea class="question" name="questions[]" rows="4" cols="50" required></textarea>
          </div>
          <div class="form-group">
            <label for="options">Options:</label>
            <input type="text" class="options" name="options[0][]" required>
            <input type="text" class="options" name="options[0][]" required>
            <input type="text" class="options" name="options[0][]" required>
            <input type="text" class="options" name="options[0][]" required>
          </div>
          <div class="form-group">
            <label for="correct_answer">Correct Answer:</label>
            <select class="correct_answer" name="correct_answers[]" required>
              <option value="0">Option 1</option>
              <option value="1">Option 2</option>
              <option value="2">Option 3</option>
              <option value="3">Option 4</option>
            </select>
          </div>
        </div>
      </div>
      <button type="button" id="addQuestion">Add Question</button>
      <button type="submit" name="submit">Add Quiz</button>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      // Add question fields dynamically
      $("#addQuestion").click(function() {
        var questionCount = $(".question").length;
        var newQuestionHtml = `
          <div class="question">
            <div class="form-group">
              <label for="question">Question:</label>
              <textarea class="question" name="questions[]" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
              <label for="options">Options:</label>
              <input type="text" class="options" name="options[${questionCount}][]" required>
              <input type="text" class="options" name="options[${questionCount}][]" required>
              <input type="text" class="options" name="options[${questionCount}][]" required>
              <input type="text" class="options" name="options[${questionCount}][]" required>
            </div>
            <div class="form-group">
              <label for="correct_answer">Correct Answer:</label>
              <select class="correct_answer" name="correct_answers[]" required>
                <option value="0">Option 1</option>
                <option value="1">Option 2</option>
                <option value="2">Option 3</option>
                <option value="3">Option 4</option>
              </select>
            </div>
          </div>
        `;
        $("#questionsContainer").append(newQuestionHtml);
      });
    });
  </script>
</body>
</html>
