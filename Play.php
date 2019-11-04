<?php
require('header.php');
require('navbar.php');
require('auth.php');

 ?>

<h1 class="Play-Welcome">Welcome To Pop!</h1>

<form action="gameresults.php" method="post" id="answers" target="_blank">

    <h3 id="firstquestion" class="firstquestion">What languages were used to program Pop ?</h3>
<section id="gamequiz" class="gamequiz">
    <div>
        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
        <label for="question-1-answers-A">A) HTML/CSS, PHP </label>
    </div>

    <div>
        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
        <label for="question-1-answers-B">B) HTML/CSS, JavaScript, </label>
    </div>

    <div>
        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
        <label for="question-1-answers-C">C) HTML/CSS JavaScript, PHP, </label>
    </div>

    <div>
        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
        <label for="question-1-answers-D">D) HTML/CSS</label>
    </div>

    <h3>Are you new to Pop ?</h3>

    <div>
        <input type="radio" name="question-2-answers" id="question-1-answers-A" value="A" />
        <label for="question-1-answers-A">A) Noob </label>
    </div>

    <div>
        <input type="radio" name="question-2-answers" id="question-1-answers-B" value="B" />
        <label for="question-1-answers-B">B) Casual</label>
    </div>

    <div>
        <input type="radio" name="question-2-answers" id="question-1-answers-C" value="C" />
        <label for="question-1-answers-C">C) Elite</label>
    </div>
    <h3>Ready To Play ?</h3>

    <div>
        <input type="radio" name="question-3-answers" id="question-1-answers-A" value="A" />
        <label for="question-1-answers-A">A) YES </label>
    </div>

    <div>
        <input type="radio" name="question-3-answers" id="question-1-answers-B" value="B" />
        <label for="question-1-answers-B">B) NO </label>
    </div>
</section>

<input id="submitquiz" type="submit" value=" START " />

</form>

 <?php
 // footer
 require('footer.php');
  ?>
